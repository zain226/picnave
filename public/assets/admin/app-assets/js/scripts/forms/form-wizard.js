/*=========================================================================================
    File Name: wizard-steps.js
    Description: wizard steps page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
    'use strict';
    var arrayVal = [];
    var bsStepper = document.querySelectorAll('.bs-stepper'),
        select = $('.select2'),
        horizontalWizard = document.querySelector('.horizontal-wizard-example'),
        verticalWizard = document.querySelector('.vertical-wizard-example'),
        modernWizard = document.querySelector('.modern-wizard-example'),
        modernVerticalWizard = document.querySelector('.modern-vertical-wizard-example');

    // Adds crossed class
    if (typeof bsStepper !== undefined && bsStepper !== null) {
        for (var el = 0; el < bsStepper.length; ++el) {
            bsStepper[el].addEventListener('show.bs-stepper', function (event) {
                var index = event.detail.indexStep;
                var numberOfSteps = $(event.target).find('.step').length - 1;
                var line = $(event.target).find('.step');

                // The first for loop is for increasing the steps,
                // the second is for turning them off when going back
                // and the third with the if statement because the last line
                // can't seem to turn off when I press the first item. ¯\_(ツ)_/¯

                for (var i = 0; i < index; i++) {
                    line[i].classList.add('crossed');

                    for (var j = index; j < numberOfSteps; j++) {
                        line[j].classList.remove('crossed');
                    }
                }
                if (event.detail.to == 0) {
                    for (var k = index; k < numberOfSteps; k++) {
                        line[k].classList.remove('crossed');
                    }
                    line[0].classList.remove('crossed');
                }
            });
        }
    }

    // select2
    select.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this.select2({
            placeholder: 'Select value',
            dropdownParent: $this.parent()
        });
    });

    // Horizontal Wizard
    // --------------------------------------------------------------------
    if (typeof horizontalWizard !== undefined && horizontalWizard !== null) {
        var numberedStepper = new Stepper(horizontalWizard),
            $form = $(horizontalWizard).find('form');
        $form.each(function () {
            var $this = $(this);
            $this.validate({
                rules: {
                    username: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    'confirm-password': {
                        required: true,
                        equalTo: '#password'
                    },
                    'first-name': {
                        required: true
                    },
                    'last-name': {
                        required: true
                    },
                    address: {
                        required: true
                    },
                    landmark: {
                        required: true
                    },
                    country: {
                        required: true
                    },
                    language: {
                        required: true
                    },
                    twitter: {
                        required: true,
                        url: true
                    },
                    facebook: {
                        required: true,
                        url: true
                    },
                    google: {
                        required: true,
                        url: true
                    },
                    linkedin: {
                        required: true,
                        url: true
                    }
                }
            });
        });

        $(horizontalWizard)
            .find('.move-next')
            .each(function () {
                $(this).on('click', function (e) {
                    numberedStepper.next();
                });
            });

        // $(horizontalWizard)
        //     .find('.move-next-req')
        //     .each(function () {
        //         $(this).on('click', function (e) {
        //             $(".child-checkbox:checked").each(function () {
        //                 arrayVal.push($(this).val());
        //             })
        //             $.ajax({
        //                 url: itemsForReq,
        //                 data: {arrayVal},
        //                 type: "GET",
        //                 dataType: "JSON",
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 },
        //                 success: function (result) {
        //                     var html = ``;
        //                     result.reqItems.forEach(function (req, key) {
        //                         html += `  <tr>
        //                                                                 <td>
        //                                                                     <div class="custom-control custom-checkbox">
        //                                                                         <input type="checkbox"
        //                                                                                class="custom-control-input child-checkbox"
        //                                                                                id="itemBrand${key}"
        //                                                                                value="${req.item.id}"
        //                                                                                name="items[]"/>
        //                                                                         <label class="custom-control-label"
        //                                                                                for="itemBrand${key}"></label>
        //                                                                     </div>
        //                                                                 </td>
        //                                                             <td>${req.item.name}</td>
        //                                                             <td>${req.item.item_price * req.quantity}</td>
        //                                                             <td>${req.item.supplier.company_name}</td>
        //                                                             <td>${req.quantity}</td>
        //                                                             <td>${req.requisition.order_tax}</td>
        //                                                             <td>${req.requisition.discount}</td>
        //                                                             <td>${req.requisition.grand_total}</td>
        //                                                             <td>
        //             <div class="dropdown">
        //                 <button type="button"
        //                         class="btn btn-sm dropdown-toggle hide-arrow"
        //                         data-toggle="dropdown">
        //                     <i data-feather="more-vertical"></i>
        //                 </button>
        //                 <div class="dropdown-menu">
        //
        //                         <a class="dropdown-item req-edit-item"
        //                            href="#" data-id="${req.id}">
        //                             <i data-feather="edit-2" class="mr-50"></i>
        //                             <span>Edit</span>
        //                         </a>
        //
        //                         <a class="dropdown-item delete-btn req-edit-item" data-id="${req.id}">
        //                             <i data-feather="trash" class="mr-50"></i>
        //                             <span>Delete</span>
        //                         </a>
        //
        //                 </div>
        //             </div>
        //         </td>
        //                                                         </tr>`;
        //                     });
        //                     $('.body-content-tr-req').html(html);
        //                     numberedStepper.next();
        //                 }
        //             });
        //
        //         });
        //     });


        $(horizontalWizard)
            .find('.btn-next')
            .each(function () {
                $(this).on('click', function (e) {
                    var isValid = $(this).closest('.card').find('input').valid();
                    console.log(isValid);
                    if (isValid) {
                        console.log('yes');
                        numberedStepper.next();

                    } else {
                        console.log('no');
                        e.preventDefault();
                    }
                });
            });


        $(horizontalWizard)
            .find('.btn-prev')
            .on('click', function () {
                numberedStepper.previous();
            });

        $(horizontalWizard)
            .find('.btn-submit')
            .on('click', function () {
                var isValid = $(this).parent().siblings('form').valid();
                if (isValid) {
                    alert('Submitted..!!');
                }
            });
    }

    // Vertical Wizard
    // --------------------------------------------------------------------
    if (typeof verticalWizard !== undefined && verticalWizard !== null) {
        var verticalStepper = new Stepper(verticalWizard, {
            linear: false
        });
        $(verticalWizard)
            .find('.btn-next')
            .on('click', function () {
                verticalStepper.next();
            });
        $(verticalWizard)
            .find('.btn-prev')
            .on('click', function () {
                verticalStepper.previous();
            });

        $(verticalWizard)
            .find('.btn-submit')
            .on('click', function () {
                alert('Submitted..!!');
            });
    }

    // Modern Wizard
    // --------------------------------------------------------------------
    if (typeof modernWizard !== undefined && modernWizard !== null) {
        var modernStepper = new Stepper(modernWizard, {
            linear: false
        });
        $(modernWizard)
            .find('.btn-next')
            .on('click', function () {
                modernStepper.next();
            });
        $(modernWizard)
            .find('.btn-prev')
            .on('click', function () {
                modernStepper.previous();
            });

        $(modernWizard)
            .find('.btn-submit')
            .on('click', function () {
                alert('Submitted..!!');
            });
    }

    // Modern Vertical Wizard
    // --------------------------------------------------------------------
    if (typeof modernVerticalWizard !== undefined && modernVerticalWizard !== null) {
        var modernVerticalStepper = new Stepper(modernVerticalWizard, {
            linear: false
        });
        $(modernVerticalWizard)
            .find('.btn-next')
            .on('click', function () {
                modernVerticalStepper.next();
            });
        $(modernVerticalWizard)
            .find('.btn-prev')
            .on('click', function () {
                modernVerticalStepper.previous();
            });

        $(modernVerticalWizard)
            .find('.btn-submit')
            .on('click', function () {
                alert('Submitted..!!');
            });
    }
});
