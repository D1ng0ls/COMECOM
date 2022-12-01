class Teste {
    constructor(testeMenu, testeList, testeLinks) {
        this.testeMenu = document.querySelector(testeMenu);
        this.testeList= document.querySelector(testeList);
        this.testeLinks = document.querySelectorAll(testeLinks);
        this.activeClass = "active";

        this.handleClick = this.handleClick.bind(this);
    }

    handleClick() {
        this.testeList.classList.toggle(this.activeClass);
        this.testeMenu.classList.toggle(this.activeClass);
    }

    addClickEvent() {
        this.testeMenu.addEventListener("click", this.handleClick);
    }

    intial() {
        if(this.testeMenu) {
            this.addClickEvent();
        }
        return this;
    }
}

const testeNavbar = new Teste(
    ".mobile-menu-teste",
    ".nav-list-teste",
    ".nav-list-teste li",
);
testeNavbar.intial();