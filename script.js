// #all elements functions here
window.onload = () => {
 const myInput = document.getElementById('name');
 myInput.onpaste = e => e.preventDefault(); //prevent pasting clipboard
}
sessionStorage.clear();

$("#title_header_type").on('change', function(){
        $('.hideable,#page_head').toggle($(this).val());
        // console.log($(this).val());
        if($(this).val() == true)
        {
            // $("#menu_types").val('yes');
        }
        else
        {
            $("#menu_types").val('no-menu'); 
            $("#menu").html('&nbsp;');
        }
    });


$("#name").on('input', function(){
    // title page
    $("#page_title").html($("#name").val()); //dynamic change to output



});

$("#menu_types").on('change', function(){
    // menu_types
    switch($(this).val())
    {
        case 'nav-bar':
        // console.log('nav-bar')
        $("#menu").html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2 4a1 1 0 100-2 1 1 0 000 2zm3.75-1.5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM3 8a1 1 0 11-2 0 1 1 0 012 0zm-1 6a1 1 0 100-2 1 1 0 000 2z"></path></svg>')
        break;

        case 'swipeback':
        // console.log('swipeback')
        $("#menu").html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/></svg>');
        break;

        case 'no-menu':
        // console.log('no-menu')
        $("#menu").html('&nbsp;');
        break;
    }
});