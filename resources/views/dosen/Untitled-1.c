#include "SoftwareSerial.h"
SoftwareSerial mobil (34,35);
const int relay = 21;
#define motorkif 19  //motor kiri maju
#define motorkib 18  //motor kiri mundur
#define motorkaf 12  //motor kanan maju
#define motorkab 23  //motor kanan mundur
int parameter=0;

void setup() {
  delay(100);
  Serial.begin(9600);
//Menentukan mode untuk masing-masing pin
pinMode(motorkif,OUTPUT);
pinMode(motorkib,OUTPUT);
pinMode(motorkaf,OUTPUT);
pinMode(motorkab,OUTPUT);
mobil.begin(9600);
pinMode(relay,OUTPUT);
}
int nilai = 0;
int bacaA=0;
int bacaB=0;
int bacaC=0;
int bacaD=0;
int bacaE=0;



void loop() {

  mobil.println("z");
    digitalWrite(relay, LOW);
  String ancis = "";
while(mobil.available() > 0){
  ancis += char(mobil.read());
  
}
Serial.println(ancis);
//delay(1000);
int A=digitalRead(14); 
int B=digitalRead(15); 
int C=digitalRead(22); 
int D=digitalRead(4); 
int E=digitalRead(32); 



//E=0;
Serial.print("A : ");Serial.println(A);
Serial.print("B : ");Serial.println(B);
Serial.print("C : ");Serial.println(C);
Serial.print("D : ");Serial.println(D);
Serial.print("E : ");Serial.println(E);Serial.println();
//delay(1000);

//digitalWrite(motorkaf,LOW);
//digitalWrite(motorkab,HIGH);
//
//digitalWrite(motorkif,HIGH);
//digitalWrite(motorkib,LOW); 

//delay(250);
while(A==1){
   
    mobil.println("1");
    digitalWrite(relay, LOW);
  int A=digitalRead(2); 
int B=digitalRead(15); 
int C=digitalRead(22); 
int D=digitalRead(4); 
int E=digitalRead(27); 
 String ancis = "";
while(mobil.available() > 0){
  ancis += char(mobil.read());
}
if(ancis == "a"){
  parameter = 2;
  Serial.println("berhenti");
   digitalWrite(motorkaf,HIGH);
        digitalWrite(motorkab,HIGH);
        digitalWrite(motorkif,HIGH);
        digitalWrite(motorkib,HIGH); 
        delay(5000);
        //mundur
        digitalWrite(motorkaf,LOW);
      digitalWrite(motorkab,HIGH);
      digitalWrite(motorkif,LOW);
      digitalWrite(motorkib,HIGH);
      delay(300);
  digitalWrite(relay, HIGH);
//belok kanan
  digitalWrite(motorkaf,LOW);
      digitalWrite(motorkab,HIGH);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);  
delay(2000);
        //maju
        digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);      
}
// Serial.println(ancis);
else if(ancis == "f" ){
     Serial.println("Mobil Mati");
    digitalWrite(motorkaf,HIGH);
    digitalWrite(motorkab,HIGH);
    digitalWrite(motorkif,HIGH);
    digitalWrite(motorkib,HIGH); 
    delay(2000);
  } 
  
   else if(ancis == "b" && parameter == 2){
          Serial.println("Mobil Lurus");
          //sensor kanan mendeteksi garis hitam
          //belok kanan
          digitalWrite(motorkaf,HIGH);
          digitalWrite(motorkab,LOW);
          digitalWrite(motorkif,LOW);
          digitalWrite(motorkib,HIGH); 
           delay(900);
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      parameter = 3;
      delay(400);
      }
      else if(ancis == "b" && parameter == 0){
          Serial.println("Mobil Lurus");
          //sensor kanan mendeteksi garis hitam
          //belok kanan
          digitalWrite(motorkaf,LOW);
          digitalWrite(motorkab,HIGH);
          digitalWrite(motorkif,HIGH);
          digitalWrite(motorkib,LOW); 
           delay(800);
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      delay(400);
      }
      

     
      else if(ancis == "c")
{
   Serial.println("Belok KANAN");
//sensor kiri mendeteksi garis hitam
//belok kiri
digitalWrite(motorkaf,LOW);
digitalWrite(motorkab,HIGH);
digitalWrite(motorkif,HIGH);
digitalWrite(motorkib,LOW); 
} 
else if(ancis == "d")
{
   Serial.println("Belok KIRI");
//sensor kiri mendeteksi garis hitam
//belok kiri
digitalWrite(motorkaf,HIGH);
digitalWrite(motorkab,LOW);
digitalWrite(motorkif,LOW);
digitalWrite(motorkib,HIGH); 
} 
else  if(ancis == "e")
      {
        Serial.println("Mobil Maju");
      //kedua sensor tidak mengenai garis hitam
      //gerak maju
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      } 
}
while(B==1){
//    Serial.println("coba 1");
    mobil.println("1");
    digitalWrite(relay, LOW);
  int A=digitalRead(2); 
int B=digitalRead(15); 
int C=digitalRead(22); 
int D=digitalRead(4); 
int E=digitalRead(27); 
 String ancis = "";
while(mobil.available() > 0){
  ancis += char(mobil.read());
}
if(ancis=="a"){
  parameter = 2;
   digitalWrite(motorkaf,HIGH);
    digitalWrite(motorkab,HIGH);
    digitalWrite(motorkif,HIGH);
    digitalWrite(motorkib,HIGH); 
    delay(5000);
    //mundur
        digitalWrite(motorkaf,LOW);
      digitalWrite(motorkab,HIGH);
      digitalWrite(motorkif,LOW);
      digitalWrite(motorkib,HIGH);
      delay(300);
  digitalWrite(relay, HIGH);
//belok kanan
  digitalWrite(motorkaf,LOW);
      digitalWrite(motorkab,HIGH);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);  
delay(2000);
        //maju
        digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);   
}
//Serial.println("Meja A");
 else  if(ancis == "f"){
     Serial.println("Mobil Mati");
    digitalWrite(motorkaf,HIGH);
    digitalWrite(motorkab,HIGH);
    digitalWrite(motorkif,HIGH);
    digitalWrite(motorkib,HIGH); 
    delay(2000);
  } 
   else if(ancis == "b" && parameter == 2){
          Serial.println("Mobil Lurus");
          //sensor kanan mendeteksi garis hitam
          //belok kanan
          digitalWrite(motorkaf,LOW);
          digitalWrite(motorkab,HIGH);
          digitalWrite(motorkif,HIGH);
          digitalWrite(motorkib,LOW); 
           delay(900);
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      parameter = 3;
      delay(400);
      }
      
      else if(ancis == "b"){
          Serial.println("Mobil Lurus");
          //sensor kanan mendeteksi garis hitam
          //belok kanan
      digitalWrite(motorkaf,HIGH);
digitalWrite(motorkab,LOW);
digitalWrite(motorkif,LOW);
digitalWrite(motorkib,HIGH);
          delay(900);
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      delay(400);
      }
      else if(ancis == "c")
{
   Serial.println("Belok KANAN");
//sensor kiri mendeteksi garis hitam
//belok kiri
digitalWrite(motorkaf,LOW);
digitalWrite(motorkab,HIGH);
digitalWrite(motorkif,HIGH);
digitalWrite(motorkib,LOW); 
} 
else if(ancis == "d")
{
   Serial.println("Belok KIRI");
//sensor kiri mendeteksi garis hitam
//belok kiri
digitalWrite(motorkaf,HIGH);
digitalWrite(motorkab,LOW);
digitalWrite(motorkif,LOW);
digitalWrite(motorkib,HIGH); 
} 
else  if(ancis == "e")
      {
        Serial.println("Mobil Maju");
      //kedua sensor tidak mengenai garis hitam
      //gerak maju
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      } 
}
while(C==1){
    mobil.println("1");
    digitalWrite(relay, LOW);
  int A=digitalRead(2); 
int B=digitalRead(15); 
int C=digitalRead(22); 
int D=digitalRead(4); 
int E=digitalRead(27); 
 String ancis = "";
while(mobil.available() > 0){
  ancis += char(mobil.read());
}
if(ancis == "a"){
  parameter = 2;
  Serial.println("berhenti");
   digitalWrite(motorkaf,HIGH);
        digitalWrite(motorkab,HIGH);
        digitalWrite(motorkif,HIGH);
        digitalWrite(motorkib,HIGH); 
        delay(5000);
        //mundur
        digitalWrite(motorkaf,LOW);
      digitalWrite(motorkab,HIGH);
      digitalWrite(motorkif,LOW);
      digitalWrite(motorkib,HIGH);
      delay(300);
  digitalWrite(relay, HIGH);
//belok kanan
  digitalWrite(motorkaf,LOW);
      digitalWrite(motorkab,HIGH);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);  
delay(2000);
        //maju
        digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);      
}
 else if(ancis == "f" ){
     Serial.println("Mobil Mati");
    digitalWrite(motorkaf,HIGH);
    digitalWrite(motorkab,HIGH);
    digitalWrite(motorkif,HIGH);
    digitalWrite(motorkib,HIGH); 
    delay(2000);
  } 
  
   else if(ancis == "b" && parameter == 2){
          Serial.println("Mobil Lurus");
          //sensor kanan mendeteksi garis hitam
          //belok kanan
          digitalWrite(motorkaf,HIGH);
          digitalWrite(motorkab,LOW);
          digitalWrite(motorkif,LOW);
          digitalWrite(motorkib,HIGH); 
           delay(1200);
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      parameter = 3;
      delay(400);
      }
     
      else if(ancis == "b" && parameter == 1){
       
          Serial.println("Mobil Lurus");
          //sensor kanan mendeteksi garis hitam
          //belok kanan
          digitalWrite(motorkaf,LOW);
          digitalWrite(motorkab,HIGH);
          digitalWrite(motorkif,HIGH);
          digitalWrite(motorkib,LOW); 
           delay(800);
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      delay(400);
      }
       else if(ancis == "b" && parameter == 0){
         parameter=1;
          Serial.println("Mobil Lurus");
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      delay(300);
      }

     
      else if(ancis == "c")
{
   Serial.println("Belok KANAN");
//sensor kiri mendeteksi garis hitam
//belok kiri
digitalWrite(motorkaf,LOW);
digitalWrite(motorkab,HIGH);
digitalWrite(motorkif,HIGH);
digitalWrite(motorkib,LOW); 
} 
else if(ancis == "d")
{
   Serial.println("Belok KIRI");
//sensor kiri mendeteksi garis hitam
//belok kiri
digitalWrite(motorkaf,HIGH);
digitalWrite(motorkab,LOW);
digitalWrite(motorkif,LOW);
digitalWrite(motorkib,HIGH); 
} 
else  if(ancis == "e")
      {
        Serial.println("Mobil Maju");
      //kedua sensor tidak mengenai garis hitam
      //gerak maju
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      } 
}
while(D==1){
  
//    Serial.println("coba 1");
    mobil.println("1");
    digitalWrite(relay, LOW);
  int A=digitalRead(2); 
int B=digitalRead(15); 
int C=digitalRead(22); 
int D=digitalRead(4); 
int E=digitalRead(27); 
 String ancis = "";
while(mobil.available() > 0){
  ancis += char(mobil.read());
}
if(ancis=="a"){
  parameter = 2;
   digitalWrite(motorkaf,HIGH);
    digitalWrite(motorkab,HIGH);
    digitalWrite(motorkif,HIGH);
    digitalWrite(motorkib,HIGH); 
    delay(5000);
    //mundur
        digitalWrite(motorkaf,LOW);
      digitalWrite(motorkab,HIGH);
      digitalWrite(motorkif,LOW);
      digitalWrite(motorkib,HIGH);
      delay(300);
  digitalWrite(relay, HIGH);
//belok kanan
  digitalWrite(motorkaf,LOW);
      digitalWrite(motorkab,HIGH);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);  
delay(2000);
        //maju
        digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);   
}
//Serial.println("Meja A");
 else  if(ancis == "f"){
     Serial.println("Mobil Mati");
    digitalWrite(motorkaf,HIGH);
    digitalWrite(motorkab,HIGH);
    digitalWrite(motorkif,HIGH);
    digitalWrite(motorkib,HIGH); 
    delay(2000);
  } 
   else if(ancis == "b" && parameter == 2){
          Serial.println("Mobil Lurus");
          //sensor kanan mendeteksi garis hitam
          //belok kanan
          digitalWrite(motorkaf,LOW);
          digitalWrite(motorkab,HIGH);
          digitalWrite(motorkif,HIGH);
          digitalWrite(motorkib,LOW); 
           delay(900);
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      parameter = 3;
      delay(400);
      }
      
      else if(ancis == "b"){
          Serial.println("Mobil Lurus");
          //sensor kanan mendeteksi garis hitam
          //belok kanan
      digitalWrite(motorkaf,HIGH);
digitalWrite(motorkab,LOW);
digitalWrite(motorkif,LOW);
digitalWrite(motorkib,HIGH);
          delay(900);
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      delay(400);
      }
      else if(ancis == "c")
{
   Serial.println("Belok KANAN");
//sensor kiri mendeteksi garis hitam
//belok kiri
digitalWrite(motorkaf,LOW);
digitalWrite(motorkab,HIGH);
digitalWrite(motorkif,HIGH);
digitalWrite(motorkib,LOW); 
} 
else if(ancis == "d")
{
   Serial.println("Belok KIRI");
//sensor kiri mendeteksi garis hitam
//belok kiri
digitalWrite(motorkaf,HIGH);
digitalWrite(motorkab,LOW);
digitalWrite(motorkif,LOW);
digitalWrite(motorkib,HIGH); 
} 
else  if(ancis == "e")
      {
        Serial.println("Mobil Maju");
      //kedua sensor tidak mengenai garis hitam
      //gerak maju
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      } 
}
while(C==1){
    mobil.println("1");
    digitalWrite(relay, LOW);
  int A=digitalRead(2); 
int B=digitalRead(15); 
int C=digitalRead(22); 
int D=digitalRead(4); 
int E=digitalRead(27); 
 String ancis = "";
while(mobil.available() > 0){
  ancis += char(mobil.read());
}
if(ancis == "a"){
  parameter = 2;
  Serial.println("berhenti");
   digitalWrite(motorkaf,HIGH);
        digitalWrite(motorkab,HIGH);
        digitalWrite(motorkif,HIGH);
        digitalWrite(motorkib,HIGH); 
        delay(5000);
        //mundur
        digitalWrite(motorkaf,LOW);
      digitalWrite(motorkab,HIGH);
      digitalWrite(motorkif,LOW);
      digitalWrite(motorkib,HIGH);
      delay(300);
  digitalWrite(relay, HIGH);
//belok kanan
  digitalWrite(motorkaf,LOW);
      digitalWrite(motorkab,HIGH);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);  
delay(2000);
        //maju
        digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);      
}
 else if(ancis == "f" ){
     Serial.println("Mobil Mati");
    digitalWrite(motorkaf,HIGH);
    digitalWrite(motorkab,HIGH);
    digitalWrite(motorkif,HIGH);
    digitalWrite(motorkib,HIGH); 
    delay(2000);
  } 
  
   else if(ancis == "b" && parameter == 2){
          Serial.println("Mobil Lurus");
          //sensor kanan mendeteksi garis hitam
          //belok kanan
          digitalWrite(motorkaf,HIGH);
          digitalWrite(motorkab,LOW);
          digitalWrite(motorkif,LOW);
          digitalWrite(motorkib,HIGH); 
           delay(1500);
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      parameter = 3;
      delay(400);
      }
     
      else if(ancis == "b" && parameter == 1){
       
          Serial.println("Mobil Lurus");
          //sensor kanan mendeteksi garis hitam
          //belok kanan
          digitalWrite(motorkaf,LOW);
          digitalWrite(motorkab,HIGH);
          digitalWrite(motorkif,HIGH);
          digitalWrite(motorkib,LOW); 
           delay(800);
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      delay(400);
      }
       else if(ancis == "b" && parameter == 0){
         parameter=1;
          Serial.println("Mobil Lurus");
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      delay(300);
      }

     
      else if(ancis == "c")
{
   Serial.println("Belok KANAN");
//sensor kiri mendeteksi garis hitam
//belok kiri
digitalWrite(motorkaf,LOW);
digitalWrite(motorkab,HIGH);
digitalWrite(motorkif,HIGH);
digitalWrite(motorkib,LOW); 
} 
else if(ancis == "d")
{
   Serial.println("Belok KIRI");
//sensor kiri mendeteksi garis hitam
//belok kiri
digitalWrite(motorkaf,HIGH);
digitalWrite(motorkab,LOW);
digitalWrite(motorkif,LOW);
digitalWrite(motorkib,HIGH); 
} 
else  if(ancis == "e")
      {
        Serial.println("Mobil Maju");
      //kedua sensor tidak mengenai garis hitam
      //gerak maju
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      } 
}
while(D==1){
    mobil.println("1");
    digitalWrite(relay, LOW);
  int A=digitalRead(2); 
int B=digitalRead(15); 
int C=digitalRead(22); 
int D=digitalRead(4); 
int E=digitalRead(27); 
 String ancis = "";
while(mobil.available() > 0){
  ancis += char(mobil.read());
}
if(ancis == "a"){
  parameter = 2;
  Serial.println("berhenti");
   digitalWrite(motorkaf,HIGH);
        digitalWrite(motorkab,HIGH);
        digitalWrite(motorkif,HIGH);
        digitalWrite(motorkib,HIGH); 
        delay(5000);
        //mundur
        digitalWrite(motorkaf,LOW);
      digitalWrite(motorkab,HIGH);
      digitalWrite(motorkif,LOW);
      digitalWrite(motorkib,HIGH);
      delay(300);
  digitalWrite(relay, HIGH);
//belok kanan
  digitalWrite(motorkaf,LOW);
      digitalWrite(motorkab,HIGH);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);  
delay(2000);
        //maju
        digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);      
}
 else if(ancis == "f" ){
     Serial.println("Mobil Mati");
    digitalWrite(motorkaf,HIGH);
    digitalWrite(motorkab,HIGH);
    digitalWrite(motorkif,HIGH);
    digitalWrite(motorkib,HIGH); 
    delay(2000);
  } 
  
   else if(ancis == "b" && parameter == 2){
          Serial.println("Mobil Lurus");
          //sensor kanan mendeteksi garis hitam
          //belok kanan
          digitalWrite(motorkaf,LOW);
          digitalWrite(motorkab,HIGH);
          digitalWrite(motorkif,HIGH);
          digitalWrite(motorkib,LOW); 
           delay(1500);
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      parameter = 3;
      delay(400);
      }
     
      else if(ancis == "b" && parameter == 1){
       
          Serial.println("Mobil Lurus");
          //sensor kanan mendeteksi garis hitam
          //belok kanan
          digitalWrite(motorkaf,LOW);
          digitalWrite(motorkab,HIGH);
          digitalWrite(motorkif,HIGH);
          digitalWrite(motorkib,LOW); 
           delay(800);
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      delay(400);
      }
       else if(ancis == "b" && parameter == 0){
         parameter=1;
          Serial.println("Mobil Lurus");
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      delay(300);
      }

     
      else if(ancis == "c")
{
   Serial.println("Belok KANAN");
//sensor kiri mendeteksi garis hitam
//belok kiri
digitalWrite(motorkaf,LOW);
digitalWrite(motorkab,HIGH);
digitalWrite(motorkif,HIGH);
digitalWrite(motorkib,LOW); 
} 
else if(ancis == "d")
{
   Serial.println("Belok KIRI");
//sensor kiri mendeteksi garis hitam
//belok kiri
digitalWrite(motorkaf,HIGH);
digitalWrite(motorkab,LOW);
digitalWrite(motorkif,LOW);
digitalWrite(motorkib,HIGH); 
} 
else  if(ancis == "e")
      {
        Serial.println("Mobil Maju");
      //kedua sensor tidak mengenai garis hitam
      //gerak maju
      digitalWrite(motorkaf,HIGH);
      digitalWrite(motorkab,LOW);
      digitalWrite(motorkif,HIGH);
      digitalWrite(motorkib,LOW);
      } 
}

}