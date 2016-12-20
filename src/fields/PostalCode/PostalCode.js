var postalCodeValue = "";
PGForm.current().form.find('[name="PostalCode"]').on('input', function(){
    var newValue = jQuery(this).val();

    if (!/^\d*$/.test(newValue)) {
        newValue = postalCodeValue;
    } else {
        postalCodeValue = newValue;
    }

    jQuery(this).val(newValue);
});
