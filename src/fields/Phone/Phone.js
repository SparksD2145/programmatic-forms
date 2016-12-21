jQuery(document).ready(function(){
    var current = PGForm.current();
    current.form.find('[type="tel"]').mask('(999) 999-9999');
});