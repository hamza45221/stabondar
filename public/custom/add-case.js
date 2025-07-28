"use strict";

// Class definition
var KTModalCustomersAdd = function () {
    var submitButton;
    var cancelButton;
    var closeButton;
    var validator;
    var form;
    var modal;
    var editor;
    // Init form inputs
    var handleForm = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    // 'category_id': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Category is required'
                    //         }
                    //     }
                    // },



                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Revalidate country field. For more info, plase visit the official plugin site: https://select2.org/
        $(form.querySelector('[name="country"]')).on('change', function() {
            // Revalidate the field when an option is chosen
            validator.revalidateField('country');
        });
        var edit=false;
        var editId=0;
        $(document).on("click",'.btn-edit',function(){
            editId=$(this).attr('data-id');
            console.log($(this).attr('data-dt'));
            var data=JSON.parse($(this).attr('data-dt'));

            $('[name="site_award_heading_1"]').val(data.site_award_heading_1);
            $('[name="site_award_heading_2"]').val(data.site_award_heading_2);
            $('[name="web_day_heading_1"]').val(data.web_day_heading_1);
            $('[name="web_day_heading_2"]').val(data.web_day_heading_2);
            $('[name="web_day_heading_3"]').val(data.web_day_heading_3);
            $('[name="fwa_heading_1"]').val(data.fwa_heading_1);
            $('[name="fwa_heading_2"]').val(data.fwa_heading_2);
            $('[name="studio_heading_1"]').val(data.studio_heading_1);
            $('[name="studio_heading_2"]').val(data.studio_heading_2);
            $('[name="depo_studio"]').val(data.depo_studio);
            $('[name="hero_image"]').val(data.hero_image);
            $('[name="case_nav_name"]').val(data.case_nav_name);
            $('[name="case_nav_section"]').val(data.case_nav_section);
            $('[name="case_nav_footer"]').val(data.case_nav_footer);
            $('[name="depo_suquence_hero_image"]').val(data.depo_suquence_hero_image);
            $('[name="depo_sequence_banner_content"]').val(data.depo_sequence_banner_content);
            $('[name="home_sec_images1"]').val(data.home_sec_images1);
            $('[name="home_sec_images2"]').val(data.home_sec_images2);
            $('[name="home_page_images1"]').val(data.home_page_images1);
            $('[name="home_page_images2"]').val(data.home_page_images2);
            $('[name="home_page_video"]').val(data.home_page_video);

            $('[name="case_image1"]').val(data.case_image1);
            $('[name="case_image2"]').val(data.case_image2);
            $('[name="case_image3"]').val(data.case_image3);
            $('[name="case_image4"]').val(data.case_image4);
            $('[name="case_image5"]').val(data.case_image5);
            $('[name="case_video"]').val(data.case_video);
            $('[name="case_image6"]').val(data.case_image6);
            $('[name="case_image7"]').val(data.case_image7);
            $('[name="case_image8"]').val(data.case_image8);
            $('[name="case_vide2"]').val(data.case_vide2);

            $('[name="contact_img1"]').val(data.contact_img1);
            $('[name="contact_img2"]').val(data.contact_img2);
            $('[name="contact_img3"]').val(data.contact_img3);

            $('[name="footer_image"]').val(data.footer_image);
            $('[name="footer_thumb"]').val(data.footer_thumb);
            $('[name="footer_text"]').val(data.footer_text);
            $('[name="footer_fixed_img"]').val(data.footer_fixed_img);
            $('[name="footer_fixed_text"]').val(data.footer_fixed_text);




            $('[name=id]').val(editId);
            $('#hero_image').attr('src',data.main_image_1)



            edit=true;
            console.log(data.description);
            editor.setData(data.description);
        })
        $('#kt_modal_add_customer').on('hide.bs.modal',function(){
            edit=false;
            $('[name="site_award_heading_1"]').val('');
            $('[name="site_award_heading_2"]').val('');
            $('[name="web_day_heading_1"]').val('');
            $('[name="web_day_heading_2"]').val('');
            $('[name="web_day_heading_3"]').val('');
            $('[name="fwa_heading_1"]').val('');
            $('[name="fwa_heading_2"]').val('');
            $('[name="studio_heading_1"]').val('');
            $('[name="studio_heading_2"]').val('');
            $('[name="depo_studio"]').val('');
            $('[name="hero_image"]').val('');
            $('[name="case_nav_name"]').val('');
            $('[name="case_nav_section"]').val('');
            $('[name="case_nav_footer"]').val('');
            $('[name="depo_suquence_hero_image"]').val('');
            $('[name="depo_sequence_banner_content"]').val('');
            $('[name="home_sec_images1"]').val('');
            $('[name="home_sec_images2"]').val('');
            $('[name="home_page_images1"]').val('');
            $('[name="home_page_images2"]').val('');
            $('[name="home_page_video"]').val('');

            $('[name="case_image1"]').val('');
            $('[name="case_image2"]').val('');
            $('[name="case_image3"]').val('');
            $('[name="case_image4"]').val('');
            $('[name="case_image5"]').val('');
            $('[name="case_video"]').val('');
            $('[name="case_image6"]').val('');
            $('[name="case_image7"]').val('');
            $('[name="case_image8"]').val('');
            $('[name="case_vide2"]').val('');

            $('[name="contact_img1"]').val('');
            $('[name="contact_img2"]').val('');
            $('[name="contact_img3"]').val('');

            $('[name="footer_image"]').val('');
            $('[name="footer_thumb"]').val('');
            $('[name="footer_text"]').val('');
            $('[name="footer_fixed_img"]').val('');
            $('[name="footer_fixed_text"]').val('');

            console.log('modal hide');

        });

        // Action buttons
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        var formData=new FormData($('#kt_modal_add_customer_form')[0]);
                        if (edit==true){
                            formData.append('edit',true);
                            formData.append('id',editId);
                        }
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable submit button whilst loading
                        submitButton.disabled = true;
                        $.ajax({
                            url: $('#kt_modal_add_customer_form').attr('action'),
                            method: $('#kt_modal_add_customer_form').attr('method'),
                            data:formData,
                            cache : false,
                            processData: false,
                            contentType: false,
                            success:function(data){
                                submitButton.removeAttribute('data-kt-indicator');
                                edit=false;

                                if(data.success){
                                    swal.fire({
                                        text: "Thank you! You've updated your basic info",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-light-primary"
                                        }
                                    });
                                    modal.hide();
                                }else {
                                    swal.fire({
                                        text: data.message,
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-light-primary"
                                        }
                                    });
                                }



                                // Enable submit button after loading
                                submitButton.disabled = false;
                                $('#kt_customers_table').DataTable().ajax.reload(null, false);
                                // setTimeout(function(){
                                //     window.location.reload();
                                // },500)

                            },
                            error:function(error){

                            }
                        });
                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });

        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });

        closeButton.addEventListener('click', function(e){
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        })
    }

    return {
        // Public functions
        init: function () {
            // Elements
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_customer'));

            form = document.querySelector('#kt_modal_add_customer_form');
            submitButton = form.querySelector('#kt_modal_add_customer_submit');
            cancelButton = form.querySelector('#kt_modal_add_customer_cancel');
            closeButton = form.querySelector('#kt_modal_add_customer_close');
            ClassicEditor
                .create(document.querySelector('#kt_docs_ckeditor_classic'))
                .then(myEditor => {
                    console.log(editor);
                    editor=myEditor;
                })
                .catch(error => {
                    console.error(error);
                });
            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalCustomersAdd.init();
});
