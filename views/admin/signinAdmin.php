<?php
  session_start();
  if(isset($_SESSION['Admin'])){
    unset($_SESSION['Admin']);
    session_destroy();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Facebook admin</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="../assets/css/login-page/SF Pro Display Bold.css"
    />
    <link
      rel="stylesheet"
      href="../assets/css/login-page/SF Pro Display Medium.css"
    />
    <link
      rel="stylesheet"
      href="../assets/css/login-page/SF Pro Display Regular.css"
    />
    <link rel="stylesheet" href="../assets/css/login-page/login-page.css" />
  </head>

  <body>
    <div id="body">
      <div class="container">
        <div>
          <div id="body-row" class="row">
            <div class="col-xxl-1"></div>
            <div
              class="
                  col-xxl-5 
                  col-lg-6 col-12
                  d-flex
                  flex-column
                  justify-content-center
                  justify-content-lg-start
                  align-items-center
                  align-items-lg-start
                  "
            >
              <div id="img-wrapper">
                <img
                  id="logo-img"
                  src="https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg"
                />
              </div>
              <div id="body-left-bottom">
                <h1 id="header-title">
                    Welcome to the management page. The interests of every user are in your hands!
                </h1>
              </div>
            </div>
            <div
              class="
                col-xxl-5
                col-lg-6
                col-12
                d-flex 
                flex-column
                justify-content-center
                align-items-center
              "
            >
              <div id="body-top-right">
                <form action="process_signin.php" method="post">
                  <div>
                    <input
                      name="UserEmail"
                      class="form-control login-form-input"
                      type="text"
                      placeholder="Email address"
                      autofocus
                      required
                    />
                    <input
                      name="UserPassword"
                      id="login-form-input-password"
                      class="form-control login-form-input"
                      type="password"
                      placeholder="Password"
                      required
                    /> 
                    <?php
                      if(isset($_GET['error'])){
                      echo "<span style='color:red;'>".$_GET['error']."</span>";
                      } 
                    ?>
                  </div>
                  <div>
                    <button
                      name="btnSignIn"
                      id="login-btn"
                      class="btn btn-primary btn-lg"
                      type="submit"
                    >
                      Log In
                    </button>
                  </div>
                </form>
              </div>
              <div
                id="body-right-bottom"
                class="
                  d-flex
                  justify-content-center
                  align-items-center
                "
                style="width: 390px; margin-top: 30px; font-size: 14px"
              >
                <a
                  class="text-decoration-none"
                  href="#"
                  style="color: var(--bs-gray-900); font-weight: bold"
                  >Create a Page</a
                ><span>&nbsp;for a celebrity, brand or business.</span>
              </div>
            </div>
            <div class="col-xxl-1"></div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="container">
        <footer>
          <div class="row">
            <div class="col-xxl-1"></div>
            <div id="footer-wrapper" class="col">
              <div
                id="footer-top"
                class="d-flex justify-content-xxl-start align-items-xxl-center"
              >
                <ul id="footer-top-list" class="list-inline text-muted">
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">English (UK)</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Tiếng Việt</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">中文(台灣)</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">한국어</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">日本語</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Français (France)</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">ภาษาไทย</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Español</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Português (Brasil)</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Deutsch</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Italiano</li>
                  </a>
                </ul>
                <button
                  id="footer-top-btn"
                  class="
                    btn btn-light btn-sm
                    d-flex
                    justify-content-center
                    align-items-center
                  "
                  type="button"
                >
                  +
                </button>
              </div>
              <div>
                <ul id="footer-bottom-list" class="list-inline text-muted">
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Sign up</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Log In</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Messenger</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Facebook Lite</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Watch</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Places</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Games</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Marketplace</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Facebook Pay</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Jobs</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Oculus</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Portal</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Instagram</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Bulletin</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Local</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Fundraisers</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Services</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Voting Information Centre</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Groups</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">About</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Create Page</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Developers</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Careers</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Privacy</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Cookies</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">AdChoices</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Terms</li>
                  </a>
                  <a
                    href=""
                    class="
                      text-decoration-none text-color-gray
                      list-inline-item
                    "
                  >
                    <li class="list-inline-item">Help</li>
                  </a>
                </ul>
              </div>
              <div id="footer-license-wrapper">
                <span id="footer-license">Meta © 2021</span>
              </div>
            </div>
            <div class="col-xxl-1"></div>
          </div>
        </footer>
      </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/src/login.js" charset="utf-8"></script> 
  </body>
</html>
