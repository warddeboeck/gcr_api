<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Thank you!</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      
      /*All the styling goes here*/
      
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; 
      }

      body {
        background-color: #ffffff;
        font-family: serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; 
      }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: serif;
          font-size: 14px;
          vertical-align: top; 
      }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #ffffff;
        width: 100%; 
      }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; 
      }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 580px;
        padding: 10px; 
      }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; 
      }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; 
      }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%; 
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          font-size: 16px;
          text-align: center; 
      }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: serif;
        font-weight: 600;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px; 
      }

      h1 {
        font-size: 38px;
        font-weight: 700;
        text-transform: capitalize; 
        margin-bottom: 0px; 
      }

      h2 {
        font-weight: 700;
        font-size: 30px;
        color: #00f;
        margin-bottom: 40px; 
      }

      p,
      ul,
      ol {
        font-family: serif;
        font-size: 18px;
        font-weight: 500;
        margin: 0;
        margin-bottom: 15px; 
      }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; 
      }

      a {
        color: #00f;
        text-decoration: underline; 
      }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; 
      }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; 
      }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; 
      }

      .btn-primary table td {
        background-color: #3498db; 
      }

      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; 
      }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; 
      }

      .first {
        margin-top: 0; 
      }

      .align-center {
        text-align: center; 
      }

      .align-right {
        text-align: right; 
      }

      .align-left {
        text-align: left; 
      }

      .clear {
        clear: both; 
      }

      .mt0 {
        margin-top: 0; 
      }

      .mb0 {
        margin-bottom: 0; 
      }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; 
      }

      .powered-by a {
        text-decoration: none; 
      }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0; 
      }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; 
        }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; 
        }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; 
        }
        table[class=body] .content {
          padding: 0 !important; 
        }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; 
        }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; 
        }
        table[class=body] .btn table {
          width: 100% !important; 
        }
        table[class=body] .btn a {
          width: 100% !important; 
        }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; 
        }
      }

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; 
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; 
        }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; 
        }
        #MessageViewBody a {
          color: inherit;
          text-decoration: none;
          font-size: inherit;
          font-family: inherit;
          font-weight: inherit;
          line-height: inherit;
        }
        .btn-primary table td:hover {
          background-color: #34495e !important; 
        }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; 
        } 
      }

      .share-img {
        height: 30px;
        width: auto;
        margin-right:40px;
      }

      .share-img-linkedin {
        margin-right:0px;
      }

      .more-info {
        margin-top:30px;
      }

    </style>
  </head>
  <body class="">
    <span class="preheader">Thank you for reviewing or having your idea reviewed</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <h1>Thank you!</h1>
                        <h2>#GlobalCreativeReview</h2>
                        <p>Dear,</p>  
                        <p>Thank you for reviewing or having your idea reviewed. We hope it was helpful and that you made some interesting connections.</p>  
                        <p>As the deadline for submitting to the UN is tomorrow, we are putting the platform on hold. We want to remind you to submit your idea to the UN on their <a href="https://www.talenthouse.com/i/united-nations-global-call-out-to-creatives-help-stop-the-spread-of-covid-19">platform</a> before the deadline expires.</p>
                        <p>Good Luck!</p>
                        <p>Love,</br>the team.</p> 
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                  <p>Make it global.</br>
                  Share to your network.</p>
                  <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fglobalcreativereview.com%2F&quote=This%20platform%20connects%20creatives%20with%20creative%20leaders%20to%20get%20feedback%20on%20UN%20ideas.%20Join%20as%20a%20reviewer%20or%20share%20your%20idea%20here.%20%23GlobalCreativeReview"><img class="share-img" src="{{ env('FRONTEND_URL') }}static/icons/facebook.png"/></a>
                  <a target="_blank" href="https://twitter.com/intent/tweet?text=This%20platform%20connects%20creatives%20with%20creative%20leaders%20to%20get%20feedback%20on%20UN%20ideas.%20Join%20as%20a%20reviewer%20or%20share%20your%20idea%20here.%20%23GlobalCreativeReview&url=https%3A%2F%2Fglobalcreativereview.com%2F&original_referer=https%3A%2F%2Ftwitter.com%2Fshare%3Furl%3Dhttps%253A%252F%252Fglobalcreativereview.com%252F%26text%3DThis%2520platform%2520connects%2520creatives%2520with%2520creative%2520leaders%2520to%2520get%2520feedback%2520on%2520UN%2520ideas.%2520Join%2520as%2520a%2520reviewer%2520or%2520share%2520your%2520idea%2520here.%2520%2523GlobalCreativeReview"><img class="share-img" src="{{ env('FRONTEND_URL') }}static/icons/twitter.png"/></a>
                  <a target="_blank" href="https://www.linkedin.com/shareArticle/?url=https%3A%2F%2Fglobalcreativereview.com%2F&mini=true"><img class="share-img share-img-linkedin" src="{{ env('FRONTEND_URL') }}static/icons/linkedin.png"/></a>
                  <p class="more-info">If you have any questions you can always visit our <a href="{{ env('FRONTEND_URL') }}faq">FAQ page</a> or e-mail us at <a href="mailto:info@globalcreativereview.com">info@globalcreativereview.com</a>.</p>
                  <p>If you want to unsubscribe as a reviewer, <a href="mailto:info@globalcreativereview.com?SUBJECT=Unsubscribe Reviewer">click here</a>.</p>
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>