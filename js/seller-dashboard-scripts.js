$(document).ready(function () {

    //loading the contents of the home page
    $('main').load('contents.php #Home');
    

    //checking the id of the link clicked
    $('a').click(function () {
        var clickedLink = $(this).attr('id');
        // alert(clickedLink);
        
        $('main').load('contents.php #' + clickedLink);

        if(clickedLink == 'listNewBook'){
            $('main').load('sell-book.php');
        }

    });

});