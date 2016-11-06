// CSRF_TOKEN
$.ajaxSetup({ 
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content') } 
});