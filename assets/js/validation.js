(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()





  // document.getElementById("edit_user_img").click(async function(){
  //   alert("hello")
  //   const { value: file } = await Swal.fire({
  //     title: 'Select image',
  //     input: 'file',
  //     inputAttributes: {
  //       'accept': 'image/*',
  //       'aria-label': 'Upload your profile picture'
  //     }
  //   })
    
  //   if (file) {
  //     const reader = new FileReader()
  //     reader.onload = (e) => {
  //       Swal.fire({
  //         title: 'Your uploaded picture',
  //         imageUrl: e.target.result,
  //         imageAlt: 'The uploaded picture'
  //       })
  //     }
  //     reader.readAsDataURL(file)
  //   }
  // })
  async function editPhotoProfil(){
    const { value: file } = await Swal.fire({
          title: 'Select image',
          input: 'file',
          inputAttributes: {
            'accept': 'image/*',
            'aria-label': 'Upload your profile picture'
          }
        })
        
        if (file) {
          const reader = new FileReader()
          reader.onload = (e) => {
            
            //here to write a code :
            document.getElementById("img_holder").style.backgroundImage="url('"+e.target.result+"')";
            $.post("../include/handlers/UserHandler.php",{updateImgUrl:e.target.result},function(data,satatus){console.log(data)})
          }
          reader.readAsDataURL(file)
        }
  }