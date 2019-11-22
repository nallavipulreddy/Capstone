int sensor_pin = A0; // Soil Sensor input at Analog PIN A0
int output_value ;
int outp;
void setup() {
  // put your setup code here, to run once:
 pinMode(4,OUTPUT);
     Serial.begin(9600);
 
   Serial.println("Reading From the Sensor ...");
 
   delay(2000);
}

void loop() {
  // put your main code here, to run repeatedly:
output_value= analogRead(sensor_pin);
 outp=analogRead(sensor_pin);
 output_value = map(output_value,550,10,0,100);
 
   Serial.print("Mositure : ");
   Serial.println(outp);
   if(outp<550){
      digitalWrite(4,HIGH);
     }
     else{
            digitalWrite(4,LOW);
     }
   delay(3000);
}
