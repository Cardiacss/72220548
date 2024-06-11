@section("nav")
<div class="row mt-3 vh-100">
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link {{ ($key == "home") ? "active":"" }}" id="v-pills-home-tab" href="/">Home</a>
        <a class="nav-link {{ ($key == "laptop") ? "active":"" }}" id="v-pills-profile-tab" href="/laptop">Laptop</a>
        <a class="nav-link {{ ($key == "keranjang") ? "active":"" }}" id="v-pills-messages-tab" href="/keranjang">Keranjang</a>
        <a class="nav-link {{ ($key == "about") ? "active":"" }}" id="v-pills-settings-tab" href="/About">About</a>
    </div>
</div>
@show()