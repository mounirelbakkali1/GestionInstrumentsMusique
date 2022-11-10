$(document).ready(function () {
    $('#example').DataTable();
});

// IIFE -> Immediatly invocked function expression
(function () {
    'use strict'
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity() || (form.pwd_confirm.value != form.pwd.value)) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
})()
$(document).ready(()=> {
    $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        }
    });
    var contents;
    $('.changeable').click(function (){
       contents=$(this).html();
    });
    $('.changeable').blur(function(e) {
        if (contents!=$(this).html()){
            let id_table=$(this).attr("id").split("_");
            let column_name=id_table[0];
            let id_element =id_table[1];
            let data = $(this).text();
            updateDB(column_name,data,id_element);
            contents = $(this).html();
        }
    });


    $('.imgInstrument').click(function (){
        let id = $(this).attr("id").split("_")[1];
        let image_url ;
        (async ()=>{
            const { value: file } = await Swal.fire({
                title: 'Select image',
                input: 'file',
                inputAttributes: {
                    'accept': 'image/*',
                    'aria-label': 'Upload your profile picture',
                }
            })
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    Swal.fire({
                        title: 'Your uploaded picture',
                        imageUrl: e.target.result,
                        imageAlt: 'The uploaded picture'
                    })
                    $(this).parent().find("img").attr("src",e.target.result);
                    updateDB("Images_url", e.target.result,id);
                }
                reader.readAsDataURL(file)
            }
        })()
    });
    $(".availability").change(function (){
        let id = $(this).attr("id").split("_")[1];
        console.log(id);
        if(this.checked) {
            var returnVal = confirm("Are you sure to make this instrumnet available ?");
            $(this).prop("checked", returnVal);
            updateDB("Available",1,id);
        }else{
            var returnVal = confirm("Are you sure to make this instrumnet unvailable ?");
            $(this).prop("", returnVal);
            updateDB("Available",0,id);
        }
    })

})

function updateDB(column,data,id){
    $.post("./includes/instrumentHandler.php",{
        column : column,
        data:data,
        id:id
    },function (data,status){
        $("#h1").html(data);
    });
}