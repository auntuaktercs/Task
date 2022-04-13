$('body').on("submit", "#report_form", function (event) {
    event.preventDefault();
    const encodeForm = (data) => {
        return Object.keys(data)
            .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(data[key]))
            .join('&');
    }
    var win = window.open($('#report_form').attr('action')+"?"+$('form').serialize(), '_blank');
    win.focus();
});
