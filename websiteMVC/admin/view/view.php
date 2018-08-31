<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            #header{
                height: 150px;
                background: red;
            }
            #footer{
                height: 150px;
                background: blue;
            }
            #content{
                height: 150px;
                background: yellow;
            }
        </style>
    </head>
    <body>
        <div id="header">
            HEADER
        </div>
         
        <div id="content">
            CONTENT
            <h2><?php echo $title; ?></h2>
        </div>
         
        <div id="footer">
            FOOTER
        </div>
    </body>
</html>