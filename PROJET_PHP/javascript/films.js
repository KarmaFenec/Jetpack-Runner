document.addEventListener("DOMContentLoaded", function() {

    const options = {
        root: document.querySelector("body"),
        threshold: 1.0,
        rootMargin: "0px",
    };
    let target = document.querySelectorAll(".accordion-header");

    function callbackFunction(entries){
        console.log("caca2");
        const [entry] = entries;
        console.log(entry);
        target.forEach(element => {
            if(entry.isIntersecting){
                element.classList.remove("hidden");
                element.classList.add("test");        
            }
            else{
                element.classList.add("hidden");
                element.classList.remove("test");
            }
        });
        
    }

    let observer = IntersectionObserver(callbackFunction, options);
    observer.observe(target);
})


