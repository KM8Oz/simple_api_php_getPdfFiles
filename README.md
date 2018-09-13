# simple_api_php_getPdfFiles
get pdf file in your unindexed folder by post method and you can sepecify the Cors origine host for more securité
### usage example :
```javascript
 var http = new XMLHttpRequest();
        var corp = {
            folder: // **dir**
        }
        http.addEventListener("load", reqListener);
        http.open("POST","api/api.php",true);
        http.send(JSON.stringify(corp));
 function reqListener () {
        console.log(this.responseText);
      }
```
### change "cors origin" here :  
```php
header("Access-Control-Allow-Origin: { /* here */ }"); 
```
