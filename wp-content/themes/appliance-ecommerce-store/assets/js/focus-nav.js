( function( window, document ) {
  function appliance_ecommerce_store_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const appliance_ecommerce_store_nav = document.querySelector( '.sidenav' );
      if ( ! appliance_ecommerce_store_nav || ! appliance_ecommerce_store_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...appliance_ecommerce_store_nav.querySelectorAll( 'input, a, button' )],
        appliance_ecommerce_store_lastEl = elements[ elements.length - 1 ],
        appliance_ecommerce_store_firstEl = elements[0],
        appliance_ecommerce_store_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && appliance_ecommerce_store_lastEl === appliance_ecommerce_store_activeEl ) {
        e.preventDefault();
        appliance_ecommerce_store_firstEl.focus();
      }
      if ( shiftKey && tabKey && appliance_ecommerce_store_firstEl === appliance_ecommerce_store_activeEl ) {
        e.preventDefault();
        appliance_ecommerce_store_lastEl.focus();
      }
    } );
  }
  appliance_ecommerce_store_keepFocusInMenu();
} )( window, document );