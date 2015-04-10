
hljs.configure({tabReplace: '    '});

$("pre").each(function (i, e) {
    hljs.highlightBlock(e);
});

