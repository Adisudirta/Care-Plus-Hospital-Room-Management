  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
      <div class="container">
          @if (!auth()->user() || \Request::is('static-sign-up'))
          <div class="row">
              <div class="col-8 mx-auto text-center mt-1">
                  <p class="mb-0 text-secondary">
                      Copyright ©

                      <script>
                          document.write(new Date().getFullYear())

                      </script>

                      | Create with 🪄 & 🤯 by

                      <span style="color: #252f40;" class="font-weight-bold ml-1" target="_blank">Mantap Team</a>
                  </p>
              </div>
          </div>
          @endif
      </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
