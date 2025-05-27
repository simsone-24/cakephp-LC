$(document).ready(function () {
    console.log('loaded')
    $('.dropify').dropify();


    $('#submit').on('click', function (e) {
        e.preventDefault();
        console.log('name:');

        validation();
        if (validation) {
            $('#form').submit();
        }
    })

    function validation() {
        let image = $('#image').val();
        let name = $('#name').val();
        let gender = $('#gender').val();
        let email = $('#email').val();
        let status = $('input[name="status"]:checked').val();

        // let name = $('#').val();

        let isValid = true;
        // console.log('email',$('#email'))
        console.log('image:', image);
        console.log('name:', name);
        console.log('Gender:', gender);
        console.log('email:', email);
        console.log('status:', status);


console.log("Radio status val:", $('input[name="status"]:checked').val());
console.log("Radio is checked:", $('input[name="status"]:checked').length);
console.log("All radios found:", $('input[name="status"]').length);


        if (image === "") {
            toastr.error('Enter the image');
            status = false;
        }
        if (name === "") {
            toastr.error('Enter the name');
            isValid = false;
        } if (email === "") {
            toastr.error('Enter the email');
            isValid = false;
        }
         if (gender === "") {
            toastr.error('Enter the gender');
            isValid = false;
        } if (status != true && status != false) {
            toastr.error('Enter the status');
            isValid = false;
        }

    }



});