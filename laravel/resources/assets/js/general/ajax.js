function Ajax(ajaxMethod, ajaxUrl, datatype){
    this.metajaxMethodhod = ajaxMethod;
    this.ajaxUrl = ajaxUrl;
    this.datatype = datatype;
};

Ajax.prototype.sendEmptyRequest = function() {
    $.ajax({
        method: this.ajaxMethod,
        url: this.ajaxUrl,
        datatype: this.datatype,
        success: function(result){
            var option = new Option(optionTypes.ROLE);
            option.create(result);
        },
        error: function(){
            console.log('Ajax - error');
        }
    });
};