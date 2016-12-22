(function initPhone() {
    var current = PGForm.current();

    jQuery(document).ready(function(){
        current.form.find('[type="tel"]').mask('(999) 999-9999');
    });
})();