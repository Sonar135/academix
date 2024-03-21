$(window).scroll(()=>{
    console.log(window.scrollY)
    var scrollPosition = window.scrollY; // Get the current scroll position

    
  

   

    if(scrollPosition>=100 ){
       $(".upper_nav").addClass("upper_nav_close");
       $(".nav").css("background", "#04091e85");
       $("#line").css("border-bottom", "1px solid transparent ");  
    }



        if(scrollPosition<100 ){
            $(".upper_nav").removeClass("upper_nav_close");
            $(".nav").css("background", "transparent");
            $("#line").css("border-bottom", "1px solid #39353e");  
    }
     
    

   

})

$(document).ready(function() {
$(".no_acc").click(()=>{
    $(".login").css("display", "none")
    $(".signup").css("display", "flex")
})

$(".has_acc").click(()=>{
    $(".login").css("display", "flex")
    $(".signup").css("display", "none")
})



$('#toggle').click(()=>{
    $(".edit_overlay").css("display", "flex");
})

$(".exit").click(()=>{
    $(".edit_overlay").css("display", "none");
})



let lists = document.querySelectorAll("#list");


lists.forEach(list => {
    list.addEventListener("click", () => {
        $("#selected").html(list.innerHTML);
        $("#myInput").val(list.innerHTML);
    });
});


$('#file').change(function(){
    // Get the selected file
    const file = $(this)[0].files[0];
    
    // Check if a file is selected
    if (file) {
        // Get the filename
        const fileName = file.name;
        
        // Output the filename
        console.log("Selected file: " + fileName);

        $(".label").html(fileName);
       
    } else {
        console.log("No file selected");
    }
});



$("#my_btn").prop("disabled", true);

$("#my_input").on("input", function() {
    if ($(this).val() !== "") {
        $("#my_btn").prop("disabled", false);
    } else {
        $("#my_btn").prop("disabled", true);
    }
});

})