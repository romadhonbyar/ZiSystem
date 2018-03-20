<script src='http://1000hz.github.io/bootstrap-validator/dist/validator.min.js'></script>
<script type="text/javascript">
    //$('#reg_form').validator();
    $('#reg_form').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            /* handle the invalid form...*/
            console.log('No');
        } else {
            /*everything looks good!*/
            console.log('Yes');
        }
    })
</script>

<!--
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/language/id_ID.min.js'></script>
<script src="<?php //echo base_url('assets/backend/plugins/bootstrap-validator/bootstrap-validator.js');?>"></script>
<script type="text/javascript">
   $(document).ready(function() {
    $('#reg_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
            <? if( $url2 == "setting"){ ?>
                <? if($url3 == "general"){ ?>                        
                    name_web: {
                        validators: {
                                stringLength: {
                                min: 2,
                            },
                                notEmpty: {
                                message: 'Please supply a name website'
                            }
                        }
                    },                  
                    slogan_web: {
                        validators: {
                            stringLength: {
                                min: 10,
                                max: 100,
                                message:'Please enter at least 10 characters and no more than 100'
                            },
                            notEmpty: {
                                message: 'Please supply a slogan website'
                            }
                        }
                    },	
                <? } else if($url3 == "seo"){ ?>      
                    meta_description: {
                        validators: {
                            stringLength: {
                                min: 100,
                                max: 156,
                                message:'Please enter at least 100 characters and no more than 156'
                            },
                            notEmpty: {
                                message: 'Please supply a meta description'
                            }
                        }
                    },	
                    meta_keywords: {
                        validators: {
                            stringLength: {
                                min: 5,
                            },
                            notEmpty: {
                                message: 'Please supply your meta keyword'
                            }
                        }
                    },
                    meta_author: {
                        validators: {
                            stringLength: {
                                min: 5,
                            },
                            notEmpty: {
                                message: 'Please supply your meta author'
                            }
                        }
                    },
                    meta_google_verification: {
                        validators: {
                            stringLength: {
                                min: 5,
                            },
                            notEmpty: {
                                message: 'Please supply your meta google verification'
                            }
                        }
                    },
                <? } else if($url3 == "socmed"){ ?>      
                    facebook: {
                        validators: {
                            stringLength: {
                                min: 1,
                            },
                            notEmpty: {
                                message: 'Please supply username or ID facebook'
                            }
                        }
                    },	
                    twitter: {
                        validators: {
                            stringLength: {
                                min: 1,
                            },
                            notEmpty: {
                                message: 'Please supply username or ID twitter'
                            }
                        }
                    },	
                    google_plus: {
                        validators: {
                            stringLength: {
                                min: 1,
                            },
                            notEmpty: {
                                message: 'Please supply username or ID google plus'
                            }
                        }
                    },	
                    instagram: {
                        validators: {
                            stringLength: {
                                min: 1,
                            },
                        }
                    },
                    youtube: {
                        validators: {
                            stringLength: {
                                min: 1,
                            },
                        }
                    },	
                    whatsapp: {
                        validators: {
                            stringLength: {
                                min: 9,
                                max: 13,
                                message:'Please enter at least 9 characters and no more than 13'
                            },
                        }
                    },
                <? } ?>
            <? } ?>
            
            <? if($url2 == "update_knowledge"){ ?>                        
                title_knowledge: {
                    validators: {
                            stringLength: {
                            min: 10,
                        },
                            notEmpty: {
                            message: 'Please supply a title knowledge'
                        }
                    }
                },                  
                content_knowledge: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply content knowledge'
                        }
                    }
                },	      
                tags_knowledge: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply tags knowledge'
                        }
                    }
                },	
            <? } ?>
            
            <? if($url2 == "add_permission"){ ?>                          
                perm_key: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply permission key'
                        }
                    }
                },	      
                perm_name: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply permission name'
                        }
                    }
                },	
            <? } ?>
            
            <? if($url2 == "add_category" or $url2 == "update_category"){ ?>                          
                name_category: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply name category'
                        }
                    }
                },	     
            <? } ?>


            <? if($url2 == "create_user" or $url2 == "update_user"){ ?>  
            full_name: {
                message: 'The full name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The full name is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The full name can only consist of alphabetical'
                    }
                }
            },
            identity: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The username can only consist of alphabetical, number and underscore'
                    },
                    different: {
                        field: 'password',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your phone number'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The phone can only consist of number'
                    }
                }
            },
	        email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Please supply a valid email address'
                    }
                }
            },
	        password: {
                validators: {
                    identical: {
                        field: 'password_confirm',
                        message: 'Confirm your password below - type same password please'
                    },
                    different: {
                        field: 'identity',
                        message: 'The password cannot be the same as username'
                    },
                }
            },
            password_confirm: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            <? } ?>   
            }
        })
		
 	
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#reg_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
</script>
-->