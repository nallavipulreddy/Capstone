<?php
include 'dbh.php';

if(!empty($_GET['Mac']))
    {
    	$status = $_GET['Mac'];
            echo '</h1>'.$status.'</h1';
            echo "\n";
		    echo "OK";
	}
 

?>



/*WiFiClient client = server.available();    
    if (!client) 
    {
      return;
    }
  Serial.println("Waiting for new client");   
  while(!client.available())
  {
    delay(1);
  }
 
  String request = client.readStringUntil('\r');
  Serial.println(request);
  client.flush();
 
 
  int value = LOW;
  if (request.indexOf("/LED=ON") != -1)  
  {
    digitalWrite(LED, HIGH);
    value = HIGH;
  }
  if (request.indexOf("/LED=OFF") != -1)  
  {
    digitalWrite(LED, LOW);
    value = LOW;
  }
 
/*------------------Creating html page---------------------*/

  client.println("HTTP/1.1 200 OK");
  client.println("Content-Type: text/html");
  client.println(""); 
  client.println("<!DOCTYPE HTML>");
  client.println("<html>");
 
  client.print("LED is: ");
 
  if(value == HIGH) 
  {
    client.print("ON");
  } 
  else 
  {
    client.print("OFF");
  }
  client.println("<br><br>");
  client.println("<a href=\"/LED=ON\"\"><button>ON</button></a>");
  client.println("<a href=\"/LED=OFF\"\"><button>OFF</button></a><br />");  
  client.println("</html>");
 
  delay(1);
  Serial.println("Client disonnected");
  Serial.println("");
 */
