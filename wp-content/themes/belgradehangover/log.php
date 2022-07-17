<?php

/**
 * Template Name: Log
 */
?>
<script>

let previous;
let latest;

setInterval(function() {
        
        let logs = new XMLHttpRequest;

        logs.open("POST", '/logLoad.php', true);
        logs.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        logs.onreadystatechange = function () {
            
            if (logs.readyState === 4) {

                if (logs.status === 200) {

                    let data = JSON.parse(logs.responseText)[0];

                    latest = data.id;

                    if ( latest !== previous && previous !== undefined) {

                        console.log(data.response);
                    
                    }

                    previous = data.id;


                } else {

                }
            }
        }
        
        logs.send();

    }, 500);

</script>
<?php
