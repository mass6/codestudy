(function noteform() {
    $(".select2").select2({
      tags: true,
      tokenSeparators: [',', ' ']
    })

    $('.summernote').summernote({
        height: 300
    })

    $("#preview").click(function(e){
        e.preventDefault();

        var title = $("#title").val();
        var text = $(".note-editable").html() + '<hr/><div><a href="#" class="btn btn-primary" onclick="window.close()">Close</a></div>';

        // Create the new window object
        var win = window.open('','printwindow');
        win.document.write('<html><head><title>Print it!</title><link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"><link rel="stylesheet" href="http://codestudy.app/css/railcasts.min.css"></head><body>');
        win.document.write('<div class="container"><div class="col-md-10 col-md-offset-1"><br/><h3>' + title + '</h3><br/>' + text + '</div></div>');
        win.document.write('</body></html>');

        // Add the scripts

        // jQuery
        var jq=document.createElement('script');
        jq.setAttribute('type','text/javascript');
        jq.setAttribute('src', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
        if (typeof jq!=undefined)
          win.document.getElementsByTagName("body")[0].appendChild(jq);

        // Bootstrap
        var bs=document.createElement('script');
        bs.setAttribute('type','text/javascript');
        bs.setAttribute('src', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js');
        if (typeof bs!=undefined)
          win.document.getElementsByTagName("body")[0].appendChild(bs);

        // Highlight.js
        var fileref=document.createElement('script');
        fileref.setAttribute('type','text/javascript');
        fileref.setAttribute('src', '//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js');
        if (typeof fileref!=undefined)
          win.document.getElementsByTagName("body")[0].appendChild(fileref);

        //
        var cScript=document.createElement('script');
        cScript.setAttribute('type','text/javascript');
        cScript.setAttribute('src', '/js/highlight.init.js');
        if (typeof cScript!=undefined)
          win.document.getElementsByTagName("body")[0].appendChild(cScript);

    });

}());