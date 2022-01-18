<style>
body{
  background-color:#a5afae;
  margin:0;
  overflow:hidden;
}
.check {
  position: relative;

  background-color:white;
  width:970px;
  height:370px;
  border:5px solid white;
}
.border{
    width: 100%;
  height: 100%;
  overflow: auto;
  margin: auto;
  position: absolute;
  top: 0; left: 0; bottom: 0; right:0;
  border:2px solid black;
}
.container{
  background-color:#d9fad1;
  overflow: hidden;
  margin: 3px;
  position: absolute;
  top: 0; left: 0; bottom: 0; right:0;
  border:1px solid black;
}
.content{
  margin:5px;
}
<link rel="stylesheet" href= "https://fonts.googleapis.com/css?family=Damion">
<link rel="stylesheet" href= "https://fonts.googleapis.com/css?family=Mrs+Saint+Delafield">

/* @import url(https://fonts.googleapis.com/css?family=Damion);
@import url(https://fonts.googleapis.com/css?family=Mrs+Saint+Delafield); */

/* pattern from subtlepatterns.com */
/* https://subtlepatterns.com/patterns/sneaker_mesh_fabric.png */

/* font-family: 'Damion', cursive; */

* {
  box-sizing:border-box;
  font-family:Helvetica;

}
.one{
  width:100%;
}
.title{
  width:300px;
  text-align:center;
  font-family: Helvetica;
  display:inline;
  margin-left:25px;
  margin-bottom:40px;


}

#bold{
  font-weight:bold;
  font size:24px;
  text-transform:uppercase;
  letter-spacing:0.4px;
  line-height:150%;

}


.name{
  text-transform:uppercase;
  font-size:11px;
  letter-spacing:0.1px;
}
.number {
  font-family: "Courier New";
  font-weight: bold;
  margin-top:20px;
  font-size:20px;
 margin-left:103px;
  display:inline;
  position:fixed;
  letter-spacing:1px;


}
.following{
  display:inline;
  font-family: Helvetica;
  font-size:10px;
  text-transform:uppercase;
  border:1px solid;
  width:417px;
  min-width: 415px;
  max-width: 417px;
  margin-left:16px;
  margin-top:10px;
  border-collapse:collapse;
}
.line{
  text-align:center;
  width:415px;
  min-width: 415px;
  max-width: 415px;
  height:26px;
  font-size:8px;
  padding:12;;

}

.empty{
  border-top:1px solid;


}
label{
  font-family: Helvetica;
  color: #333;
  background-color:#d9fad1;
  text-align: center;
  border: none;
  width: auto;
  text-transform: uppercase;
}
label[name="reason"], label[name="reason2"]{
  width: 400px;
}
.two{
  width:100%;
  margin-top:16px;

}

.orderof {
  font-family: 'Damion', cursive;
  font-size: 1.5em;
  border-bottom: 1px solid #333;
  float: left;
  width: 75.9%;
  position: relative;
  padding-top: 0;
  padding: 0 0 0 1em;
  margin: 0px 0 2px 2em;
  line-height: 1;
  height: 32px;
  border-right: 1px solid #333;
}

.orderof:before {
  font-family: Helvetica;
  font-size: 0.5em;
  content: 'PAY';
  position: absolute;
  left: -3em;
  top: 1.3em;

}
label[name="amount"]{
  width: 300px;
  display: inline-table;
  height: 20px;
  font-size: 18px;
  text-transform: uppercase;
  letter-spacing: 0.3px;
  position: fixed;
  top: 158px;
  text-align: left;
}

.bd{
  text-align:right;
  text-transform:uppercase;
  font-family: Helvetica;
  font-size: 20px;
  letter-spacing: 8px;
}
.dollar{
  text-align:right;
  text-transform:uppercase;
  font-family: Helvetica;
  font-size: 0.5em;
  margin-left:298px;
  position:fixed;
  top:162px;
}


.info{
border-collapse: collapse;
  margin-left:11px;
  text-align: center;
  text-transform: uppercase;
  font-family: Helvetica;
  font-size: 10px;
  border:1px solid #333;
  display:inline-table;
  width:80%;
}

label[name="date"]{
  font-size: 13px;
  width: 56px;
}
label[name="name"]{
  width: 200px;
  font-size: 17px;
}
input[name="num"]{
  width: 50px;
  font-size: 13px;
}
input[name="description"]{
  width: 200px;
  font-size: 14px;
}
input[name="discount"]{
  width: 50px;
  font-size: 13px;
}
.row{

}
.chart{
border:1px solid #333;
font-weight:normal;
}
#discount{
  border-left:1px dashed;

}
.blank{
  height: 40px;
  border:1px solid #333;
  font-size:14px;

}
.short{
  width:79px;
}
.long{
  width:300px;
  font-size:18px;
}
.des{
  font-size: 15px;
}
.amount{
  text-align:center;
  width:144px;
  text-align: center;
text-transform: uppercase;
font-family: Helvetica;
font-size: 11px;
margin-right: 30px;
float: right;
display: inline;
position: absolute;
right: -7px;
top: 144px;

}
.sign{
  font-family: Helvetica;
  font-size: 15px;
  padding-right: 10px;
  position: fixed;
  display: inline;
  right: 620px;
  top: 209px;
}
p{
  text-transform:uppercase;
  font-family: Helvetica;
  font-size: 11px;
  letter-spacing: 0.5px;
  display: inline;
  padding-left: 25px;
  text-align: center;
}
.box{

  border:1px solid #333;
  width:120px;
  height:30px;
  float:right;
  clear:both;
  margin-top:20px;
}

.whole{
  border-right:1px dashed #333;
  height:28px;
  width:84px;
  margin-top:0.7px;
}
label[name="whole"]{
  text-align: right;
  width: 72px;
  right: 544px;
  top: 204px;
  font-size: 18px;;
}
label[name="cent"]{
  text-align: right;
  width: 23px;
  display: inline;
  font-size: 18px;
  position: absolute;
  margin-left: 12px;;
}
.cent{

}
.num {
  font-family: 'Damion', cursive;
  font-size: 1.5em;
  float: left;
  border: 2px solid #aaa;
  position: relative;
  margin: 0 0 0 2em;
  padding: 0 0.5em;
  line-height: 0.9em;
}

.num:before {
  font-family: Helvetica;
  content: '$';
  font-weight: bold;
  position: absolute;
  left: 1em;
}

.dollars {
  font-family: 'Damion', cursive;
  font-size: 1.5em;
  border-bottom: 1px solid #666;
  width: 84%;
  float: left;
  padding: 0 0 0 4em;
  position: relative;
}

.dollars:after {
  font-family: Helvetica;
  font-size: 0.5em;
  content: 'DOLLARS';
  position: absolute;
  right: -5em;
  top: 1.7em;
}
.add{
  width:267px;
  margin-left:80px;
  margin-top:5px;

}

.lines{
  border-bottom:1px solid #333;
  height:25px;
  font-size:13px;
  text-align:center;
  padding:0;
  margin:0;

}
label[name="address"], label[name="citystate"]{
  font-size: 13px;
  width: 260px;
  text-transform: uppercase;
  padding: 0;
  margin: 0;

}
.bank{
  font-size: 9px;
  text-align: center;
  font-family: Helvetica;
  height: 25px;
  padding-top: 10px;
  letter-spacing: 0.5px;
}
.signature{
  margin: 0 10px 30px 0.7em;
  width: 40%;
  padding-bottom: -13px;
  right: 10;
  float: right;;
}
.sig {
  font-family: 'Mrs Saint Delafield', cursive;
  font-size: 2em;

  border-bottom: 1px solid #333;
  line-height: 0.9em;

}
.mp{
  text-align: right;
  font-size: 8px;
  font-weight: bold;
  letter-spacing: -8;
}

</style>
