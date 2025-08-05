document.addEventListener("DOMContentLoaded", () => {
    Splitting();

    const preloader = document.getElementById("preloader");
    const counterText = document.getElementById("counterText");
    const wordNow = document.getElementById("nowWord");

    // Initialize now word with normal style
    wordNow.classList.add("normal");

    const allWords = document.querySelectorAll(".word");

    const tl = gsap.timeline({
        onUpdate: () => {
            const val = Math.round(tl.progress() * 100);
            counterText.textContent = `${val} - 100`;
        },
        onComplete: () => hidePreloader()
    });

    // Animate words upward
    tl.to(allWords, {
        y: "0%",
        duration: 0.6,
        ease: "circ.out",
        stagger: 0.06
    }, 0);

    // Improved blinking animation for "now"
    const blink = gsap.timeline({ repeat: 2 });
    blink.to(wordNow, {
        duration: 0.2,
        opacity: 0,
        onComplete: function () {
            wordNow.classList.toggle("italic-outline");
            wordNow.classList.toggle("normal");
        }
    });
    blink.to(wordNow, {
        duration: 0.2,
        opacity: 1
    });
    blink.to(wordNow, {
        duration: 0.2,
        opacity: 0,
        onComplete: function () {
            wordNow.classList.toggle("italic-outline");
            wordNow.classList.toggle("normal");
        }
    });
    blink.to(wordNow, {
        duration: 0.2,
        opacity: 1
    });

    tl.add(blink, 1.2);

    // Final state: outlined italic
    tl.to(wordNow, {
        duration: 0.3,
        onComplete: () => {
            wordNow.classList.remove("normal");
            wordNow.classList.add("italic-outline");
            wordNow.style.opacity = 1;
        }
    });

    function hidePreloader() {
        gsap.to(preloader, {
            y: "-100%",
            duration: 1.4,
            ease: "power3.out",
            display: "none",
            onComplete: () => preloader.remove()
        });
    }
});