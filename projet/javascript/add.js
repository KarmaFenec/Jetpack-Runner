document.addEventListener("DOMContentLoaded" , function (){
    let container = document.getElementsByClassName("before");
    console.log(container);
    for(let i = 0; i < container.length; i++){
        console.log("caca");
        let element = container[i];
        element.addEventListener("mousemove", function (event){
            element.classList.remove("before");
            element.classList.add("after");
           
        })

        element.addEventListener("mouseout", function (event){
            element.classList.remove("after");
            element.classList.add("before");
            console.log("caca2");
        })
    }
});
