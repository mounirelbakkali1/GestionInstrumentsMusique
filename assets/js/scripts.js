

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
    $('#example').DataTable();
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
                    'aria-label': 'Upload instrument picture',
                }
            })
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    $(this).parent().find("img").attr("src",e.target.result);
                    updateDB("Images_url", e.target.result,id);
                }
                reader.readAsDataURL(file)
            }
        })()
    });
    $(".availability").change(function (){
        let id = $(this).attr("id").split("_")[1];
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
    $("#addCategory").click(function (){
        (async ()=>{
            const { value: categoryName } = await Swal.fire({
                title: 'Enter category name',
                input: 'text',
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to write something!'
                    }
                }
            })
            if (categoryName) {
                $.get("./includes/instrumentHandler.php",{
                    categoryTocheck:categoryName.toLowerCase()
                },function (data,status){
                    if(data.trim()!="AE") {//  A : already E : exist
                        $.post("./includes/instrumentHandler.php",{
                            categoryName:categoryName
                        },function (data,status){
                            $("#h1").html(data);
                        });
                    }else{
                        window.location.replace('index.php?page=manageInstruments'); // refresh pour voir le message err
                    }

                });

            }
        })()
    })
    $(".categoriesTd").click(function (){
        let categories;
        let id = $(this).attr('id').split("_")[1];
        var Obj= new Promise(function(resolve) {
            // get your data and pass it to resolve()
            $.get("./includes/instrumentHandler.php",{
                getCategories:"cate"
            },function (data){
               resolve(getCatObject(JSON.parse(data)));
            });
        });
        (async ()=>{
            const { value: category } = await Swal.fire({
                title: 'Select field validation',
                input: 'select',
                inputOptions:Obj,
                inputPlaceholder: 'Select a category',
                showCancelButton: true,
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value !== "") {
                            resolve()
                        } else {
                            resolve('You need to select a category :)')
                        }
                    })
                }
            })
            if (category) {
                updateDB("Category_ID",parseInt(category),id);
            }
        })();


    })
    $(".delInstrBtn").click(function () {
        let id = $(this).attr('id').split("_")[1];
        let imgURL = $(this).parent().parent().find('td.img').find("img").attr("src")
        $.post("./includes/instrumentHandler.php",{
            delIntrument:"true",
            id:id,
            imgURL:imgURL
        },function (data,status){
            $("#h1").html(data);
        });
    })
    $("#edit_user_img").click(function () {
        let id = $(this).attr("idedit").split("_")[1];
        let image_url ;
        (async ()=>{
            const { value: file } = await Swal.fire({
                title: 'Select image',
                input: 'file',
                inputAttributes: {
                    'accept': 'image/*',
                    'aria-label': 'Upload your profil picture',
                }
            })
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    $(this).parent().find("img").attr("src",e.target.result);
                    console.log(e.target.result);
                    updateUserInfo("imgUrl", e.target.result,id);
                    console.log(id)
                }
                reader.readAsDataURL(file)
            }
        })()
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
function updateUserInfo(column,data,id){
    $.post("./includes/userInfoHandler.php",{
        column : column,
        data:data,
        id:id,
        updateUserInf:"something",
    },function (data,status){
        console.log(data)
        $("#h1").html(data);
    });
}
function getCatObject(arr){
    let rst ={};
    arr.forEach(ele=>{
        key=ele.ID;
        Object.assign(rst, {[key] : ele.Name});    // ECS FEATURE TO MAKE DYNAMIC KEY
    });
    return rst ;

}
function search(cate){
    let searchInput = document.querySelector("input[type=search]");
    searchInput.value=cate
    $("input[type=search]").trigger('keyup');
}
