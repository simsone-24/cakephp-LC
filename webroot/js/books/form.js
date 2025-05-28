$(document).ready(function () {
    console.log('loaded')
    $('.dropify').dropify();


    $('#submitBtn').on('click', function (e) {
        e.preventDefault();
        console.log('name:');

        let validate=validation();
        if (validate) {
            console.log($('#form').serialize());

           $('form').submit();
        }
    })

    function validation() {
        let image = $('#image').val();
        let name = $('#name').val();
        let gender = $('#gender').val();
        let email = $('#email').val();
        let address = $('#address').val();
        let year =$('#publishYear').val();
        let rate =$('#rate').val();


        let status = $('input[name="status"]:checked').val();

        // let name = $('#').val();

        let isValid = true;
        // console.log('email',$('#email'))
        console.log('image:', image);
        console.log('name:', name);
        console.log('Gender:', gender);
        console.log('email:', email);
        console.log('status:', status);
        console.log('address:',address);
        console.log('year:',year);
        console.log('rate:',rate);





        if (image === "") {
            toastr.error('Enter the image');
            status = false;
        }
        if (name === "") {
            toastr.error('Enter the name');
            isValid = false;
        } 
        if (email === "") {
            toastr.error('Enter the email');
            isValid = false;
        }
        emailRegEx=/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailRegEx.test(email)) {
            toastr.error('Enter Valid Email');
            isValid = false;
        }
         if (gender === "") {
            toastr.error('Enter the gender');
            isValid = false;
        }
         if (status != true && status != false) {
            toastr.error('Enter the status');
            isValid = false;
        }
        if (address === "") {
            toastr.error('Enter the address');
            isValid = false;
        }
        if (year === "") {
            toastr.error('Enter the year');
            isValid = false;
        }
        if (rate === "") {
            toastr.error('Enter the rate');
            isValid = false;
        }
        return isValid

    }



});