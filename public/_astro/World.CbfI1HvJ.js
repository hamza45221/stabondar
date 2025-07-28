import{V as w,U as c,P as h,S as v,a as i,b as n,c as z,M as d,W as f,C as x}from"./GL.TkxuViJy.js";import{g as r}from"./index.ODjX2MmM.js";import{S as m}from"./ScrollTrigger.Dc0K9LmA.js";import{R as y}from"./Resources.ya3z7lXh.js";import{s as R}from"./sources.nZTDDFUu.js";import{E as P}from"./Layout.astro_astro_type_script_index_0_lang.D0haerwi.js";var S=`varying vec2 vUv;
varying vec3 worldNormal;
varying vec3 eyeVector;

uniform vec2 uTextureResolution;
uniform vec2 uVideoSize;

vec2 resizeUvCover(vec2 uv, vec2 size, vec2 resolution) {
    vec2 ratio = vec2(
        min((resolution.x / resolution.y) / (size.x / size.y), 1.0),
        min((resolution.y / resolution.x) / (size.y / size.x), 1.0)
    );

    return vec2(
        uv.x * ratio.x + (1.0 - ratio.x) * 0.5,
        uv.y * ratio.y + (1.0 - ratio.y) * 0.5
    );
}

void main()
{
    vec4 worldPos = modelMatrix * vec4(position, 1.0);
    vec4 modelPoisition = modelMatrix * vec4(position, 1.0);

    
    gl_Position = projectionMatrix * viewMatrix * modelPoisition;

    vec3 transformedNormal = normalMatrix * normal;
    worldNormal = normalize(transformedNormal);

    eyeVector = normalize(worldPos.xyz - cameraPosition);

    vUv = resizeUvCover(uv, uTextureResolution, uVideoSize);
}`,M=`uniform sampler2D uTexture;
uniform sampler2D uMask;
uniform sampler2D uDisplacement;
uniform vec3 uFillColor;
uniform vec2 uRes;
uniform float uColorNum;
uniform float uPixelSize;
uniform float uProgress;
uniform float uScroll;
uniform float uLoading;
uniform float uFillValue;

varying vec2 vUv;

const float bayerMatrix8x8[64] = float[64](
    0.0/ 64.0, 48.0/ 64.0, 12.0/ 64.0, 60.0/ 64.0,  3.0/ 64.0, 51.0/ 64.0, 15.0/ 64.0, 63.0/ 64.0,
  32.0/ 64.0, 16.0/ 64.0, 44.0/ 64.0, 28.0/ 64.0, 35.0/ 64.0, 19.0/ 64.0, 47.0/ 64.0, 31.0/ 64.0,
    8.0/ 64.0, 56.0/ 64.0,  4.0/ 64.0, 52.0/ 64.0, 11.0/ 64.0, 59.0/ 64.0,  7.0/ 64.0, 55.0/ 64.0,
  40.0/ 64.0, 24.0/ 64.0, 36.0/ 64.0, 20.0/ 64.0, 43.0/ 64.0, 27.0/ 64.0, 39.0/ 64.0, 23.0/ 64.0,
    2.0/ 64.0, 50.0/ 64.0, 14.0/ 64.0, 62.0/ 64.0,  1.0/ 64.0, 49.0/ 64.0, 13.0/ 64.0, 61.0/ 64.0,
  34.0/ 64.0, 18.0/ 64.0, 46.0/ 64.0, 30.0/ 64.0, 33.0/ 64.0, 17.0/ 64.0, 45.0/ 64.0, 29.0/ 64.0,
  10.0/ 64.0, 58.0/ 64.0,  6.0/ 64.0, 54.0/ 64.0,  9.0/ 64.0, 57.0/ 64.0,  5.0/ 64.0, 53.0/ 64.0,
  42.0/ 64.0, 26.0/ 64.0, 38.0/ 64.0, 22.0/ 64.0, 41.0/ 64.0, 25.0/ 64.0, 37.0/ 64.0, 21.0 / 64.0
);

float remap(float value, float originMin, float originMax, float destinationMin, float destinationMax)
{
    return destinationMin + (value - originMin) * (destinationMax - destinationMin) / (originMax - originMin);
}

vec3 orderedDither(vec2 uv, vec3 color)
{
    float threshold = 0.0;

    int x = int(uv.x * uRes.x) % 8;
    int y = int(uv.y * uRes.y) % 8;
    threshold = bayerMatrix8x8[y * 8 + x] - 0.88;

    color.rgb += threshold;
    color.r = floor(color.r * (uColorNum - 1.0) + 0.5) / (uColorNum - 1.0);
    color.g = floor(color.g * (uColorNum - 1.0) + 0.5) / (uColorNum - 1.0);
    color.b = floor(color.b * (uColorNum - 1.0) + 0.5) / (uColorNum - 1.0);

    return color;
}

void main()
{
    vec2 uv = vUv;

    float scrollProgress = remap(uScroll, 0.2, 1., 0., 1.);
    scrollProgress = clamp(scrollProgress, 0., 1.);
    scrollProgress = pow(scrollProgress, 2.);

    float maskProgress = max(uProgress, scrollProgress);

    vec2 maskedUv = uv;
    maskedUv *= 1. - (1. * maskProgress);
    maskedUv.x += 0.5 * maskProgress;
    maskedUv.y += 0.52 * maskProgress;

    vec4 displacement = texture2D(uDisplacement, uv);
    vec4 mask = texture2D(uMask, maskedUv);

    vec3 color = vec3(0.0);
    float pxileStep = displacement.r;
    float pixelSize = mix(uPixelSize, 1.0, uProgress);

    vec2 normalPixelSize = pixelSize / uRes;
    vec2 uvPixel = normalPixelSize * floor(uv / normalPixelSize);

    vec4 texture = texture2D(uTexture, uvPixel);
    float lum = dot(vec3(0.2126, 0.7152, 0.0722), texture.rgb);

    vec3 dither = orderedDither(uvPixel, vec3(lum));

    color = mix(dither, texture.rgb, uProgress);
    float alpha = mix(0.35 * mask.a, mask.a, uProgress);
    float startAlpha = mix(0.0, alpha, uLoading) * (1.0 - uFillValue);

    vec3 outPutColor = mix(color, uFillColor, uFillValue);
    float outPutAlpha = mix(startAlpha, 1.0, uFillValue);

    gl_FragColor = vec4(outPutColor, outPutAlpha);
    
}`;let b=class{constructor(e,s,t,o){this.app=e,this.gl=t,this.main=s,this.resources=o,this.scroll=this.app.scroll.lenis,this.scene=this.gl.scene,this.sizes=this.app.sizes,this.time=this.app.time,this.item=this.main.querySelector(".hero_video"),this.videoEl=this.item.querySelector("video"),this.texture=new w(this.videoEl),this.mask=this.resources.items.videoMask,this.header=this.main.querySelector(".header"),this.currentScroll=0,this.videoPosition=0,this.mouse={x:0,y:0},this.rects=this.item.getBoundingClientRect(),this.init()}init(){this.settings(),this.setMaterial(),this.setMesh(),this.setScroll(),this.mouseMove()}settings(){this.setts={color:"#EB4330",offset:.5,radius:.95,strength:1.1,colorOffset:.001,texture:this.mask,loading:0,time:0,displacement:0,transparent:.25,colorNum:2,pixelSize:5,progress:0}}setScroll(){this.rects=this.item.getBoundingClientRect(),this.setPosition()}setPosition(){c(this.mesh,new h(this.rects.width,this.rects.height,1,1)),this.mesh.position.y=-this.rects.top+this.sizes.height/2-this.rects.height/2,this.mesh.position.x=this.rects.left-this.sizes.width/2+this.rects.width/2}setMaterial(){this.material=new v({vertexShader:S,fragmentShader:M,uniforms:{uTexture:new i(this.texture),uProgress:new i(this.setts.progress),uScroll:new i(0),uMask:new i(this.setts.texture),uLoading:new i(this.setts.loading),uFillColor:new i(new z(.06640625,.06640625,.06640625)),uFillValue:new i(0),uDisplacement:new i(0),uPixelSize:new i(0),uColorNum:new i(this.setts.colorNum),uRes:new i(new n(this.sizes.width*this.sizes.pixelRatio,this.sizes.height*this.sizes.pixelRatio))},transparent:!0})}setMesh(){this.geometry=new h(this.rects.width,this.rects.height,1,1),this.mesh=new d(this.geometry,this.material),this.mesh.position.set(0,0,0),this.scene.add(this.mesh),this.material.uniforms.uPixelSize.value=this.setts.pixelSize}mouseMove(){this.item.addEventListener("mouseenter",()=>{r.to(this.material.uniforms.uProgress,{value:1,duration:1,ease:"power3.inOut"})}),this.item.addEventListener("mouseleave",()=>{r.to(this.material.uniforms.uProgress,{value:this.videoEl.muted?0:1,duration:1,ease:"power3.inOut"})})}resize(){this.setPosition()}update(){this.material.uniforms.uDisplacement.value=this.gl.fluidTexture}destroy(){this.geometry.dispose(),this.material.dispose(),this.scene.remove(this.mesh)}};var k=`varying vec2 vUv;
varying vec3 vNormal;

void main()
{
    gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);

    vUv = uv;
    vNormal = normal;
}`,T=`uniform sampler2D uCursorTexture;
uniform sampler2D uPrev;
uniform sampler2D uLogoMask;
uniform vec3 uMainColor;
uniform vec3 uBlack;
uniform vec2 uRes;
uniform vec2 uItemSize;
uniform vec2 uItemPos;
uniform float uTime;
uniform float uGap;
uniform float uAlpha;
uniform float uMask;

varying vec2 vUv;

float rand(vec2 n)
{
    return fract(sin(dot(n, vec2(12.9898, 4.1414))) * 43758.5453);
}

float noise(vec2 p)
{
    vec2 ip = floor(p);
    vec2 u = fract(p);
    u = u * u * (3.0 - 2.0 * u);

    float res = mix(
        mix(rand(ip), rand(ip + vec2(1., 0.)), u.x),
        mix(rand(ip + vec2(0., 1.)), rand(ip + vec2(1., 1.)), u.x),
        u.y
    );

    return res * res;
}

float fbm(vec2 x, int numOctaves)
{
    float v = 0.;
    float a = 0.5;
    vec2 shift = vec2(100);

    mat2 rot = mat2(cos(0.5), sin(0.5), -sin(0.5), cos(0.50));

    for(int i = 0; i < numOctaves; i++)
    {
        v += a * noise(x);
        x = rot * x * 2.0 + shift;
        a *= 0.5;
    }

    return v;
}
float blendDarken(float base, float blend)
{
    return max(base, blend);
}

vec3 blendDarken(vec3 base, vec3 blend)
{
    return vec3(blendDarken(base.r, blend.r), blendDarken(base.g, blend.g), blendDarken(base.b, blend.b));
}

vec3 blendDarken(vec3 base, vec3 blend, float opacity)
{
    return (blendDarken(base, blend) * opacity + base * (1.0 - opacity));
}
vec2 getContainUv(vec2 uv, vec2 uScreenRes, vec2 uItemSizes)
{
    float screenAspect = uScreenRes.x / uScreenRes.y;
    float textTextureAspect = uItemSizes.x / uItemSizes.y;

    vec2 scale = vec2(1.0);
    scale.y = textTextureAspect / screenAspect;

    vec2 tempUv = (uv - 0.5) * scale + 0.5;
    tempUv = clamp(tempUv, 0.0, 1.0);

    return tempUv;
}

void main()
{
    vec2 uv = vUv;
    vec2 itemPos = gl_FragCoord.xy / uItemSize;

    itemPos.y -= uGap;
    float mask = texture2D(uLogoMask, vec2(itemPos.x, itemPos.y)).r;
    vec3 fluidTexture = texture2D(uCursorTexture, uv).rgb;
    vec3 coloredFluid = fluidTexture * uMainColor;

    float alpha = clamp(0.0, 1.0, (mask + uMask)) * uAlpha;

    
    gl_FragColor = vec4(coloredFluid, alpha * fluidTexture);
    
    
}`;let U=class{constructor(e,s,t,o){this.app=e,this.gl=t,this.main=s,this.resources=o,this.scene=this.gl.scene,this.camera=this.gl.camera.instance,this.renderer=this.gl.renderer.instance,this.sizes=this.app.sizes,this.time=this.app.time,this.mask=this.resources.items.logoMask,this.item=this.main.querySelector(".empty-letter"),this.rects=this.item.getBoundingClientRect(),this.topOffset=(this.sizes.height-this.rects.top-this.rects.height)/this.sizes.height,this.targetA=new f(this.sizes.width*this.sizes.pixelRatio,this.sizes.height*this.sizes.pixelRatio),this.targetB=new f(this.sizes.width*this.sizes.pixelRatio,this.sizes.height*this.sizes.pixelRatio),this.init()}init(){this.settings(),this.setMaterial(),this.setMesh()}settings(){this.setts={}}setMaterial(){this.material=new v({vertexShader:k,fragmentShader:T,uniforms:{uCursorTexture:new i(this.gl.fluidTexture),uPrev:new i(null),uRes:new i(new n(this.sizes.width*this.sizes.pixelRatio,this.sizes.height*this.sizes.pixelRatio)),uTime:new i(0),uMainColor:new i(new x(184/255,19/255,.06666666667)),uBlack:new i(new x(.06666666667,.06666666667,.06666666667)),uLogoMask:new i(this.mask),uItemPos:new i(new n(this.rects.left*this.sizes.pixelRatio,this.rects.top*this.sizes.pixelRatio)),uItemSize:new i(new n(this.rects.width*this.sizes.pixelRatio,this.rects.height*this.sizes.pixelRatio)),uGap:new i(this.topOffset*this.sizes.pixelRatio),uAlpha:new i(1),uMask:new i(0)},transparent:!0})}setMesh(){this.geometry=new h(this.sizes.width,this.sizes.height,1,1),this.mesh=new d(this.geometry,this.material),this.scene.add(this.mesh)}resize(){this.rects=this.item.getBoundingClientRect(),c(this.mesh,new h(this.sizes.width,this.sizes.height,1,1)),this.material.uniforms.uRes.value=new n(this.sizes.width*this.sizes.pixelRatio,this.sizes.height*this.sizes.pixelRatio),this.topOffset=(this.sizes.height-this.rects.top-this.rects.height)/this.sizes.height,this.material.uniforms.uGap.value=this.topOffset,this.material.uniforms.uItemPos.value=new n(this.rects.left*this.sizes.pixelRatio,this.rects.top*this.sizes.pixelRatio),this.material.uniforms.uItemSize.value=new n(this.rects.width*this.sizes.pixelRatio,this.rects.height*this.sizes.pixelRatio),this.targetA.setSize(this.sizes.width*this.sizes.pixelRatio,this.sizes.height*this.sizes.pixelRatio),this.targetB.setSize(this.sizes.width*this.sizes.pixelRatio,this.sizes.height*this.sizes.pixelRatio)}update(){this.material.uniforms.uCursorTexture.value=this.gl.fluidTexture}destroy(){this.geometry.dispose(),this.material.dispose(),this.scene.remove(this.mesh)}};var C=`varying vec2 vUv;

void main()
{
    vUv = uv;
    vec4 modelPoisition = modelMatrix * vec4(position, 1.0);

    
    gl_Position = projectionMatrix * viewMatrix * modelPoisition;
}`,I=`uniform sampler2D uTexture;
uniform vec2 uImageAspect;
uniform vec2 uItemRes;
uniform float uAlpha;
uniform float uHover;

varying vec2 vUv;

vec2 getCoverUv(vec2 uv, vec2 uTextureResolution, vec2 uItemSizes)
{
    vec2 tempUv = uv - vec2(0.5);

    float quadAspectRatio = uItemSizes.x / uItemSizes.y;
    float textureAspectRatio = uTextureResolution.x / uTextureResolution.y;

    if (quadAspectRatio < textureAspectRatio) {
        tempUv = tempUv * vec2(quadAspectRatio / textureAspectRatio, 1.0);
    } else {
        tempUv = tempUv * vec2(1.0, textureAspectRatio / quadAspectRatio);
    }

    return tempUv + vec2(0.5);
}

const float bayerMatrix8x8[64] = float[64](
    0.0/ 64.0, 48.0/ 64.0, 12.0/ 64.0, 60.0/ 64.0,  3.0/ 64.0, 51.0/ 64.0, 15.0/ 64.0, 63.0/ 64.0,
  32.0/ 64.0, 16.0/ 64.0, 44.0/ 64.0, 28.0/ 64.0, 35.0/ 64.0, 19.0/ 64.0, 47.0/ 64.0, 31.0/ 64.0,
    8.0/ 64.0, 56.0/ 64.0,  4.0/ 64.0, 52.0/ 64.0, 11.0/ 64.0, 59.0/ 64.0,  7.0/ 64.0, 55.0/ 64.0,
  40.0/ 64.0, 24.0/ 64.0, 36.0/ 64.0, 20.0/ 64.0, 43.0/ 64.0, 27.0/ 64.0, 39.0/ 64.0, 23.0/ 64.0,
    2.0/ 64.0, 50.0/ 64.0, 14.0/ 64.0, 62.0/ 64.0,  1.0/ 64.0, 49.0/ 64.0, 13.0/ 64.0, 61.0/ 64.0,
  34.0/ 64.0, 18.0/ 64.0, 46.0/ 64.0, 30.0/ 64.0, 33.0/ 64.0, 17.0/ 64.0, 45.0/ 64.0, 29.0/ 64.0,
  10.0/ 64.0, 58.0/ 64.0,  6.0/ 64.0, 54.0/ 64.0,  9.0/ 64.0, 57.0/ 64.0,  5.0/ 64.0, 53.0/ 64.0,
  42.0/ 64.0, 26.0/ 64.0, 38.0/ 64.0, 22.0/ 64.0, 41.0/ 64.0, 25.0/ 64.0, 37.0/ 64.0, 21.0 / 64.0
);

float colNum = 5.0;

vec3 orderedDither(vec2 uv, vec3 color)
{
    float threshold = 0.0;

    int x = int(uv.x * uItemRes.x) % 8;
    int y = int(uv.y * uItemRes.y) % 8;
    threshold = bayerMatrix8x8[y * 8 + x] - 0.88;

    color.rgb += threshold;
    color.r = floor(color.r * (colNum - 1.0) + 0.5) / (colNum - 1.0);
    color.g = floor(color.g * (colNum - 1.0) + 0.5) / (colNum - 1.0);
    color.b = floor(color.b * (colNum - 1.0) + 0.5) / (colNum - 1.0);

    return color;
}

void main()
{
    vec2 uv = vUv;

    vec2 coverUv = getCoverUv(uv, uImageAspect, uItemRes);

    vec4 textureColor = texture2D(uTexture, coverUv);

    float lum = dot(vec3(0.2126, 0.7152, 0.0722), textureColor.rgb);
    vec3 dither = orderedDither(coverUv, vec3(lum));

    vec3 color = mix(textureColor.rgb, dither, uHover);

    gl_FragColor = vec4(color.rgb, uAlpha);
}`;r.registerPlugin(m);let D=class{constructor(e,s,t,o,a){this.app=e,this.gl=t,this.main=s,this.resources=o,this.section=this.main.querySelector(".projects"),this.scene=this.gl.scene,this.sizes=this.app.sizes,this.items=[...a],this.init()}init(){this.settings(),this.setMaterial(),this.addImgs(),this.setPosition(),this.setQuicks(),this.parallax()}settings(){this.setts={}}setMaterial(){this.material=new v({vertexShader:C,fragmentShader:I,transparent:!0,uniforms:{uTexture:new i,uItemRes:new i(new n),uImageAspect:new i(new n),uAlpha:new i(0),uHover:new i(0)}})}addImgs(){this.imgsStore=this.items.map(e=>{const s=e.querySelector("img"),t=s.getAttribute("width"),o=s.getAttribute("height"),a=e.getBoundingClientRect(),l=this.material.clone();l.uniforms.uTexture.value=this.resources.items[s.alt],l.uniforms.uImageAspect.value=new n(t,o),l.uniforms.uItemRes.value=new n(a.width,a.height);const p=new h(a.width,a.height,1,1),g=new d(p,l);return this.scene.add(g),{img:s,mesh:g,material:l}})}setQuicks(){this.quicksX=[],this.quicksY=[],this.ramdoms=[],this.items.forEach((e,s)=>{const t=r.quickTo(e,"--x",{duration:.6,ease:"power2",onUpdate:()=>this.setPosition()}),o=r.quickTo(e,"--y",{duration:.6,ease:"power2"}),a=r.utils.random(.9,1.1,.05);this.quicksX.push(t),this.quicksY.push(o),this.ramdoms.push(a)}),this.imgsStore.forEach(({img:e,material:s})=>{const t=e.parentElement;t.addEventListener("mouseenter",()=>{r.to(s.uniforms.uHover,{value:1,duration:.4})}),t.addEventListener("mouseleave",()=>{r.to(s.uniforms.uHover,{value:0,duration:.4})})})}parallax(){this.mouse={x:0,y:0},window.addEventListener("mousemove",e=>{this.gl.world.allowProjectsRender&&(this.mouse.x=e.clientX-window.innerWidth/2,this.mouse.y=e.clientY-window.innerHeight/2,this.items.forEach((s,t)=>{const o=this.quicksX[t],a=this.quicksY[t],l=this.mouse.x*.6*-1*this.ramdoms[t],p=this.mouse.y*.6*-1*this.ramdoms[t];o(l),a(p)}))})}addScrollAnimations(){this.appearTl=r.timeline({defaults:{duration:1.6,ease:"power2.out"}}),this.scrollTl=r.timeline({defaults:{ease:"none"}}),this.imgsStore.forEach(({img:e,material:s},t)=>{this.appearTl.fromTo(s.uniforms.uAlpha,{value:0},{value:1,duration:1},0).fromTo(e.parentElement,{"--opacity":0},{"--opacity":1,duration:1},0).fromTo(e.parentElement,{"--position":0},{"--position":1,duration:1},0),this.scrollTl.fromTo(e.parentElement,{"--scrollY":0},{"--scrollY":-this.sizes.height/2*this.ramdoms[t]},0)}),m.create({trigger:this.section,start:"top top",end:"top top-=75%",scrub:!0,animation:this.appearTl,onEnter:()=>{this.gl.world.allowProjectsRender=!0,this.section.classList.add("active")},onLeaveBack:()=>{this.gl.world.allowProjectsRender=!1,this.section.classList.remove("active")}}),m.create({trigger:this.section,start:"top top",end:"bottom bottom-=100%",scrub:!0,animation:this.scrollTl})}setPosition(){this.imgsStore.forEach(({mesh:e,img:s})=>{const t=s.parentElement.getBoundingClientRect();e.position.x=t.left+t.width/2-this.sizes.width/2,e.position.y=-t.top-t.height/2+this.sizes.height/2})}resize(){this.imgsStore.forEach(({mesh:e,img:s,material:t})=>{const o=s.parentElement.getBoundingClientRect();t.uniforms.uItemRes.value=new n(o.width,o.height),c(e,new h(o.width,o.height,1,1))})}update(){}destroy(){this.gl.world.allowProjectsRender=!1,this.imgsStore.forEach(({mesh:e})=>{this.scene.remove(e),e.geometry.dispose(),e.material.dispose()})}};var A=`varying vec2 vUv;

void main()
{
    vUv = uv;
    vec4 modelPoisition = modelMatrix * vec4(position, 1.0);

    
    gl_Position = projectionMatrix * viewMatrix * modelPoisition;
}`,O=`uniform sampler2D uTexture;
uniform sampler2D uDisplacement;
uniform vec2 uScreenRes;
uniform vec2 uItemSizes;
uniform vec2 uOffset;

varying vec2 vUv;

float PI = 3.1415926535897932384626433832795;

vec2 deformationCurve(vec2 uv, vec2 offset)
{
    vec2 tempPos = uv;
    tempPos.x = uv.x + sin(uv.y * PI) * offset.x;
    tempPos.y = uv.y + sin(uv.x * PI) * offset.y;
    return tempPos;
}

vec4 rgbShift(sampler2D textureImage, vec2 uv, vec2 offset)
{
    float r = texture2D(textureImage, uv + offset).r;
    float g = texture2D(textureImage, uv).g;
    float b = texture2D(textureImage, uv - offset).b;
    float alpha = texture2D(textureImage, uv).a ;
    return vec4(r, g, b, alpha);
}

void main()
{
    vec2 uv = vUv;

    vec4 color = vec4(0.0);
    vec2 distortedUv = deformationCurve(uv, uOffset * 0.002);
    vec4 displacement = texture2D(uDisplacement, uv);

    float edge = 0.0;
    float treshold = 0.12;

    float areaX = smoothstep(edge, (edge + treshold), uv.x) * smoothstep((1.0 - edge), (1.0 - edge - treshold), uv.x);
    float areaY = smoothstep(edge, (edge + treshold), uv.y) * smoothstep((1.0 - edge), (1.0 - edge - treshold), uv.y);
    float area = areaX * areaY;

    vec2 finalUv = mix(uv, distortedUv, area);
    vec2 distortionAmount = (displacement.rg - 0.5) * 2.0 * 0.005;
    finalUv += distortionAmount;

    
    color = rgbShift(uTexture, finalUv, uOffset * 0.0001);

    gl_FragColor = color;
    
}`;r.registerPlugin(m);class E{constructor(e,s,t){this.app=e,this.gl=t,this.main=s,this.scene=this.gl.scene,this.sizes=this.app.sizes,this.mouse=new n,this.offset=new n(0,0),this.outputOffset=new n(0,0),this.offsetQuickX=r.quickTo(this.outputOffset,"x",{duration:.4,ease:"power2"}),this.offsetQuickY=r.quickTo(this.outputOffset,"y",{duration:.4,ease:"power2"}),this.init()}init(){this.settings(),this.setMaterial(),this.setMesh()}settings(){this.setts={}}setMaterial(){this.material=new v({vertexShader:A,fragmentShader:O,transparent:!0,uniforms:{uTexture:new i,uDisplacement:new i(0),uScreenRes:new i(new n),uItemSizes:new i(new n),uOffset:new i(new n)}})}setMesh(){this.geometry=new h(this.sizes.width,this.sizes.height,1,1),this.mesh=new d(this.geometry,this.material),this.scene.add(this.mesh),this.mesh.visible=!1}onMouseMove(e){this.mouse.x=e.clientX-window.innerWidth/2,this.mouse.y=e.clientY-window.innerHeight/2}resize(){c(this.mesh,new h(this.sizes.width,this.sizes.height,1,1)),this.material.uniforms.uScreenRes.value=new n(this.sizes.width,this.sizes.height),this.material.uniforms.uItemSizes.value=new n(this.sizes.width,this.sizes.height)}update(){this.offset.x=this.lerp(this.offset.x,this.mouse.x,.1),this.offset.y=this.lerp(this.offset.y,this.mouse.y,.1),this.offsetQuickX((this.mouse.x-this.offset.x)*.09),this.offsetQuickY(-(this.mouse.y-this.offset.y)*.09),this.material.uniforms.uOffset.value.set(this.outputOffset.x,this.outputOffset.y),this.material.uniforms.uDisplacement.value=this.gl.fluidTexture}destroy(){this.material.dispose(),this.geometry.dispose(),this.scene.remove(this.mesh)}lerp(e,s,t){return e*(1-t)+s*t}}const q="/_astro/Video-mask.BiUbVwq1.png",_="/_astro/logo-mask.Sz_JTJ3U.svg";class H extends P{constructor(e,s,t){super(),this.app=e,this.gl=s,this.main=t,this.sizes=this.app.sizes,this.renderer=this.gl.renderer.instance,this.camera=this.gl.camera.instance,this.scene=this.gl.scene,this.allowRenderHero=!0,this.allowRenderAwards=!1,this.allowProjectsRender=!1,this.loadedOnce=!1,this.initWidth=this.sizes.width,this.target=new f(this.sizes.width*this.sizes.pixelRatio,this.sizes.height*this.sizes.pixelRatio),this.initWidth>1024?this.load():setTimeout(()=>this.trigger("loaded")),this.initWidth<=1024&&this.loadImages()}load(){this.projectItems=this.main.querySelectorAll(".projects_img"),this.sources=R(this.projectItems);const e={url:q,type:"textureLoader",name:"videoMask"};this.sources.push(e);const s={url:_,type:"textureLoader",name:"logoMask"};this.sources.push(s),this.resources=new y(this.sources),this.loadedOnce=!0,this.resources.on("ready",()=>this.init())}init(){this.loaded=!0,this.video=new b(this.app,this.main,this.gl,this.resources),this.paint=new U(this.app,this.main,this.gl,this.resources),this.images=new D(this.app,this.main,this.gl,this.resources,this.projectItems),this.imagesOutput=new E(this.app,this.main,this.gl),this.trigger("loaded"),this.gl.loaded=!0}setScroll(){this.video&&this.video.setScroll(),this.images&&this.images.setPosition()}update(){this.loaded&&(this.paint.update(),this.imagesOutput.update(),this.allowProjectsRender?(this.images.imgsStore.forEach(({mesh:e})=>e.visible=!0),this.imagesOutput.mesh.visible=!1,this.renderer.setRenderTarget(this.target),this.renderer.render(this.scene,this.camera),this.renderer.setRenderTarget(null),this.images.imgsStore.forEach(({mesh:e})=>e.visible=!1),this.imagesOutput.mesh.visible=!0,this.imagesOutput.material.uniforms.uTexture.value=this.target.texture):this.imagesOutput.mesh.visible&&(this.imagesOutput.mesh.visible=!1))}alwaysResize(){}resize(){this.video.resize(),this.paint.resize(),this.images.resize(),this.imagesOutput.resize()}resizeToMobile(){this.imgsLoaded||this.loadImages()}resizeFromMobile(){this.loadedOnce?setTimeout(()=>this.video.material.uniforms.uLoading.value=1,1e3):this.on("loaded",()=>{setTimeout(()=>this.video.material.uniforms.uLoading.value=1,1e3)})}onMouseMove(e,s){this.loaded&&(this.imagesOutput.onMouseMove(e,s),this.gl.getPaint=!this.allowProjectsRender)}destroy(){this.loaded&&(this.video.destroy(),this.paint.destroy(),this.images.destroy(),this.imagesOutput.destroy())}loadImages(){this.imgsLoaded=!0,this.gl.loaded=!0,this.projectItems=this.main.querySelectorAll(".projects_img"),this.projectItems.forEach(e=>{const s=e.querySelector("img"),t=s.getAttribute("data-src");s.src=t})}}export{H as default};
