// custom header element
class MyHeader extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
    this.innerHTML = `<header>
        <div class="img-slider back-bottom">
            <h1>Tante Meeuw</h1>
            <h2>in je element</h2>
        </div>
        <nav>
            <ul>
                <li><a class="page-button" href="index.php">Home</a></li>
                <li><a class="page-button" href="deTent.php">De tent</a></li>
                <li><a class="page-button" href="omgeving.php">Omgeving</a></li>
                <li><a class="page-button" href="beschikbaarheid.php">Beschikbaarheid/Prijzen</a></li>
                <li><a class="page-button" href="contact.php">Contact</a></li>
                <li><a class="page-button" href="links.php">links</a></li>
                <li><a class="page-button" href="gasten.php">Gasten</a></li>
                <li><a class="page-button" href="nieuws.php">Nieuws</a></li>
                <li><a class="page-button" href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>`;
  }
}
customElements.define("custom-header", MyHeader);
  