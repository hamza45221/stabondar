import{S as h,a as s,b as n,P as r,M as o,U as m,W as c}from"./GL.TkxuViJy.js";import{R as d}from"./Resources.ya3z7lXh.js";import{s as g}from"./sources.nZTDDFUu.js";import{E as v}from"./Layout.astro_astro_type_script_index_0_lang.D0haerwi.js";var p=`varying vec2 vUv;

void main()
{
    vUv = uv;
    vec4 modelPoisition = modelMatrix * vec4(position, 1.0);


    gl_Position = projectionMatrix * viewMatrix * modelPoisition;
}`,f=`uniform sampler2D uTexture;
uniform float uAlpha;
uniform float uVelocity;
uniform float uDistortion;
uniform vec2 uImageAspect;
uniform vec2 uItemRes;

varying vec2 vUv;

float PI = 3.1415926535897932384626433832795;

vec2 getUv(vec2 uv, vec2 uImageAspect, vec2 uItemRes)
{
    vec2 tempUv = uv - vec2(0.5);

    float quadAspectRatio = uItemRes.x / uItemRes.y;
    float textureAspectRatio = uImageAspect.x / uImageAspect.y;

    if (quadAspectRatio < textureAspectRatio) {
        tempUv = tempUv * vec2(quadAspectRatio / textureAspectRatio, 1.0);
    } else {
        tempUv = tempUv * vec2(1.0, textureAspectRatio / quadAspectRatio);
    }

    return tempUv + vec2(0.5);
}

void main()
{
    float velocity = uVelocity / 85.0 / PI;

    vec2 uv = vUv;
    vec2 correctUv = getUv(uv, uImageAspect, uItemRes);

    vec4 color = texture2D(uTexture, correctUv);
    color.a *= uAlpha;

    gl_FragColor = color;



}`;let x=class{constructor(e,t,i,u,l){this.app=e,this.gl=i,this.main=t,this.resources=u,this.items=l[0],this.img=this.main.querySelector(".contact_image").querySelector("img"),this.scene=this.gl.scene,this.sizes=this.app.sizes,this.init()}init(){this.settings(),this.setMaterial(),this.addImgs(),this.setPosition()}settings(){this.setts={}}setMaterial(){this.material=new h({vertexShader:p,fragmentShader:f,transparent:!0,uniforms:{uTexture:new s,uItemRes:new s(new n),uImageAspect:new s(new n),uAlpha:new s(0)}})}addImgs(){const e=this.img.getAttribute("width"),t=this.img.getAttribute("height"),i=this.img.getBoundingClientRect();this.material.uniforms.uTexture.value=this.resources.items[this.img.alt],this.material.uniforms.uImageAspect.value=new n(e,t),this.material.uniforms.uItemRes.value=new n(i.width,i.height),this.geometry=new r(i.width,i.height,1,1),this.mesh=new o(this.geometry,this.material),this.scene.add(this.mesh)}setPosition(e){const t=this.img.getBoundingClientRect();this.mesh.position.x=t.left+t.width/2-this.sizes.width/2,this.mesh.position.y=-t.top-t.height/2+this.sizes.height/2}resize(){const e=this.img.getBoundingClientRect();this.material.uniforms.uItemRes.value=new n(e.width,e.height),m(this.mesh,new r(e.width,e.height,1,1)),setTimeout(()=>this.setPosition(),10)}update(){}destroy(){this.scene.remove(this.mesh),this.material.dispose(),this.geometry.dispose()}};var w=`varying vec2 vUv;

void main()
{
    vUv = uv;
    vec4 modelPoisition = modelMatrix * vec4(position, 1.0);


    gl_Position = projectionMatrix * viewMatrix * modelPoisition;
}`,y=`uniform sampler2D uTexture;
uniform sampler2D uDisplacement;

float PI = 3.1415926535897932384626433832795;

varying vec2 vUv;

vec2 deformationCurve(vec2 uv, vec2 offset)
{
    vec2 tempPos = uv;
    tempPos.x = uv.x + sin(uv.y * PI) * offset.x;
    tempPos.y = uv.y + sin(uv.x * PI) * offset.y;
    return tempPos;
}

float disp = 0.0;

void main()
{
    vec2 uv = vUv;

    vec4 color = vec4(0.0);
    vec4 displacement = texture2D(uDisplacement, uv);

    uv.x += displacement.g * 0.005;
    uv.y -= displacement.r * 0.005;

    color = texture2D(uTexture, uv);

    gl_FragColor = color;
}`;class z{constructor(e,t,i){this.app=e,this.gl=i,this.main=t,this.scene=this.gl.scene,this.sizes=this.app.sizes,this.init()}init(){this.settings(),this.setMaterial(),this.setMesh()}settings(){this.setts={}}setMaterial(){this.material=new h({vertexShader:w,fragmentShader:y,transparent:!0,uniforms:{uTexture:new s,uDisplacement:new s(0)}})}setMesh(){this.geometry=new r(this.sizes.width,this.sizes.height,1,1),this.mesh=new o(this.geometry,this.material),this.scene.add(this.mesh)}resize(){m(this.mesh,new r(this.sizes.width,this.sizes.height,1,1))}update(){this.material.uniforms.uDisplacement.value=this.gl.fluidTexture}destroy(){this.material.dispose(),this.geometry.dispose(),this.scene.remove(this.mesh)}}class M extends v{constructor(e,t,i){super(),this.app=e,this.gl=t,this.main=i,this.sizes=this.app.sizes,this.renderer=this.gl.renderer.instance,this.camera=this.gl.camera.instance,this.scene=this.gl.scene,this.gl.getPaint=!1,this.initWidth=this.sizes.width,this.target=new c(this.sizes.width*this.sizes.pixelRatio,this.sizes.height*this.sizes.pixelRatio),this.initWidth>1024?this.load():setTimeout(()=>this.trigger("loaded")),this.initWidth<=1024&&this.loadImages()}load(){this.hero=this.main.querySelector(".case-hero"),this.section=this.main.querySelector(".case_container"),this.image=this.main.querySelectorAll(".contact_image"),this.sources=g(this.image),this.resources=new d(this.sources),this.resources.on("ready",()=>this.init())}init(){this.imgs=new x(this.app,this.main,this.gl,this.resources,this.image),this.output=new z(this.app,this.main,this.gl),this.trigger("loaded"),this.loaded=!0,this.gl.loaded=!0}setScroll(e){}update(){this.loaded&&(this.imgs.mesh.visible=!0,this.output.mesh.visible=!1,this.renderer.setRenderTarget(this.target),this.renderer.render(this.scene,this.camera),this.renderer.setRenderTarget(null),this.imgs.mesh.visible=!1,this.output.mesh.visible=!0,this.output.material.uniforms.uTexture.value=this.target.texture,this.output.update())}alwaysResize(){}resize(){this.output&&this.output.resize(),this.imgs&&this.imgs.resize(),this.target.setSize(this.sizes.width*this.sizes.pixelRatio,this.sizes.height*this.sizes.pixelRatio)}resizeToMobile(){this.imgsLoaded||this.loadImages()}resizeFromMobile(){this.loadedOnce?setTimeout(()=>this.imgs.material.uniforms.uAlpha.value=1,1e3):this.on("loaded",()=>{setTimeout(()=>this.imgs.material.uniforms.uAlpha.value=1,1e3)})}onMouseMove(e,t){}destroy(){this.loaded&&(this.imgs.destroy(),this.output.destroy())}loadImages(){this.imgsLoaded=!0,this.gl.loaded=!0,this.mobImgs=this.main.querySelectorAll(".contact_image"),this.mobImgs.forEach(e=>{const t=e.querySelector("img"),i=t.getAttribute("data-src");i&&(t.src=i)})}}export{M as default};
