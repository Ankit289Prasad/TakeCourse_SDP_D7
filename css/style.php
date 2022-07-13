<style type="text/css">
img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
        display: none !important;
    }
html,body{
    scroll-behavior:smooth;
    overflow-x:hidden;
    font-family:'Ubuntu', sans-serif;
}
.navbar-brand {
    font-family: 'Pattaya', sans-serif;
    font-size: 2.5em;
}

::-webkit-scrollbar{
    width: 0;
}
#scrollPath{
    position: fixed;
    top: 0;
    right: 0;
    width: 10px;
    height: 100%;
    background: rgba(138, 37, 37, 0.05);
}
#progressbar{
    position: fixed;
    z-index: 999;
    top: 0;
    right: 0;
    width: 10px;
    background: linear-gradient(to top, #5900ff, #f700ff);
    animation: animate 2s linear infinite;
}
@keyframes animate{
    0%,100%
    {
        filter: hue-rotate(0deg);
    }
    50%
    {
        filter: hue-rotate(40deg);
    }
}

.equal-column-content{
    height:400px!important;
}

.navbar ul li a {
    border-top: 2px solid rgb(51, 3, 71);
    border-bottom: 2px solid rgb(51, 3, 71);
    border-left: 1px solid rgb(51, 3, 71);
    border-right: 1px solid rgb(51, 3, 71);
    background-color: rgba(188, 64, 226, 0.663);
    border-radius: 10px;
    margin-left: 10px;
    margin-right: 10px;
}

.vid-content h1 {
    font-family: 'Marck Script', cursive;
    font-size: 3rem;
}

.custom-nav .custom-nav-item a {
    position: relative;
    display: block;
    color: #fff !important;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    padding-left: 50px;
    font-size: 1.2rem;
}

.navbar {
    height: 60px;
}

.navbar ul li a:hover {
    background-color: rgba(9, 191, 204, 0.5);
    border-color: rgb(16, 64, 95);
}

.navbar ul a.active {
    background-color: rgba(9, 191, 204, 0.801);
    border-color: rgb(16, 64, 95);
}

.navbar-text {
    color: rgb(255, 255, 255) !important;
}

.remove-vid-marg {
    margin: 0px;
    padding: 0px;
}

.vid-parent {
    position: relative;
}

video {
    position: relative;
    width: 100%;
    height: 100%;
}

.vid-overlay {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: rgba(199, 128, 240, 0.445);
    z-index: 1;
    opacity: 0.8;
}

.vid-content a {
    margin-top: 10px;
    font-size: 17px;
    background-color: rgba(188, 64, 226, 0.363);
    border: solid rgb(105, 17, 143) 2px;
}

.vid-content a:hover {
    background-color: rgba(9, 191, 204, 0.438);
    border: solid rgb(16, 64, 95) 2px;
}

.vid-content {
    position: absolute;
    z-index: 2;
    top: 45%;
    left: 35%;
    right: 35%;
    text-align: center;
    color: #fff;
}

.bottom-banner {
    color: #fff;
    padding-top: 10px;
    padding-bottom: 4px;
    padding-right: 10px;
    padding-left: 10px;
}

.txt-banner {
    margin-top: -45px;
    background-color: rebeccapurple !important;
    position: absolute;
    z-index: 3 !important;
    text-align: center;
}
.txt-banner1{
    margin-top: 0px;
    background-color: rebeccapurple !important;
    z-index: 3 !important;
    text-align: center;
}
.stripe {
    background-image: linear-gradient(240deg, rgb(204, 0, 255), rgb(65, 3, 83));
    padding: 3rem;
    height: 13rem;
    margin-top: 4rem;
    transform: rotate(10deg);
    border-radius: 5px;
    z-index: -5;
}
.social-hover a:hover{
    text-decoration:none;
}
.gh:hover {
    text-decoration: none;
    background-color: rgb(0,0,0);
}
.wa:hover{
    text-decoration: none;
    background-color:#25D366 !important;
}
.ig:hover{
    text-decoration: none;
    background-color:#C13584 !important;
}
.fb:hover{
    text-decoration: none;
    background-color:#4267B2 !important;
}
.pst{
    margin-top:80px;
    margin-left:-40%;
}
.lbl{
    margin-left:0%;
}
.pc{
    margin-top:-50px;
}
.pcd{
    background: linear-gradient(to right, #ffffff,#fff,#fff,#fff,#fff, rgb(235, 187, 240));
}
.crbg {
    background-color: rgb(255, 244, 254)!important;
}
.pcd .stripe{
    z-index: 999;
}
.searchbtnsr {
    background-color: #7e0058;
}
.searchbtnsr:hover{
    background-color: rgb(185, 3, 116);
}
.jumbotron1 {
    background-color: #ddcedf !important;
    border-radius: 10px !important;
    padding: 5% !important;
}
@media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
      margin-left: -60% !important;
      -webkit-print-color-adjust: exact;
    left: 0;
    top: 0;
  }
}
.fh{
    color:rgb(95, 0, 79);
}
.vid-content .h {
    font-size:3rem;
}
.hbg {
    background-color: rgb(158, 46, 192);
    color: white;
    box-shadow: inset 0px 0px 50px rgba(0, 0, 0, 0.568);
}
.hbg th {
    border: 1px solid rgb(80, 0, 80);
}
.row1 {
    background-color: rgb(255, 240, 255);
}
.row2 {
    background-color: #fffbff;
}
.jbt{
    background-color: #ddcedf !important;
    border-radius: 10px !important;
    padding:2%;
}
.cdtl{
    border: 2px solid rebeccapurple !important;
}
.font1{
    font-family: 'Playfair Display', serif!important;
}
.fh1{
    color:rgb(255, 0, 212);
}

@media screen and (min-width:0px) and (max-width:700px) {
    .lbl{
        font-size:15px;
        margin-left:-40px;
    }
    .equal-column-content{
    height:100% !important;
}
    .as input[type=text]{
        width: 80% !important;
        font-size: 13px !important;
    }
    .as{
        margin-top:20px;
    }
    .pst input[type=text]{
        padding:0 !important;
        padding-left:5px !important;
        padding-right:3px !important;
        margin-left:10px;
        height:90%;
        width:80%;
    }
    .fsm{
        font-size:0.8rem !important;
    }
    .pst input[type=submit]{
        padding: 1px !important;
        padding-left:5px !important;
        padding-right:5px !important;
        height:90%;
        width:70;
        margin-left:-45% !important;
    }
    .pst{
        margin-top:30px;
        margin-left:10px;
    }
    .pcd{
        background:none;
    }
    .cb img{
        margin-top:0px !important;
        object-fit:contain !important;
        width:100% !important;
    }
    .pc{
        margin-top:10px !important;
    }
    #scrollPath{
    position: fixed;
    width: 2px;
}
#progressbar{
    position: fixed;
    width: 2px;
}
    video {
        margin-top: 40px;
    }
    .bottom-banner h5 {
        font-size: 12px;
    }
    .my-content {
        position: relative;
        margin-left: 0px !important;
    }
    .vid-content .h {
        font-size: 1.8rem;
        margin-top:-30px;
    }
    .vid-content a {
        background-color: rgba(121, 16, 153, 0.815);
        border: solid rgb(112, 10, 143) 2px;
        font-size: 12px;
    }
    .vid-content {
        top: 21%;
        left: 0%;
        width: 100%;
        font-size: 1rem;
    }
    .custom-nav .custom-nav-item {
        padding: 10px 20px;
    }
    .txt-banner {
        margin-top: -6px;
        background-color: rebeccapurple !important;
        position: absolute;
        z-index: 3 !important;
    }
    .navbar {
        background-color: rgb(71, 12, 95) !important;
    }
    .navbar ul {
        background-color: rgba(103, 16, 138, 0.959);
        border-radius: 0px 0px 30px 30px;
        margin-right: 10%;
        margin-top: 5px;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .navbar ul li a {
        border-right: none;
        margin-top: -7px;
        font-size: 1rem !important;
        padding: 5px !important;
        text-align: center;
    }
    .navbar-brand {
        font-size: 1.5rem;
        margin-left: -20px;
    }
    .navbar-text {
        font-size: 0.7rem;
        margin-left: -30px;
    }
    .pcourse {
        margin-top: 120px !important;
    }
    .stripe {
        margin-top:15px;
        padding-top:10px;
        margin-bottom:40px;
        margin-left: 10%;
        margin-right: 10%;
    }
    .testyheading{
        font-size: 1.7rem !important;
    }
    .coth{
        font-size: 1.2rem !important;
    }
}
</style>