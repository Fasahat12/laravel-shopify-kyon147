const AppLink = actions.AppLink;
const NavigationMenu = actions.NavigationMenu;
const Button = actions.Button;
const TitleBar = actions.TitleBar;
const Cart = actions.Cart;

const config = {
    apiKey: 'bb8f9b890ea6c0c8be29b12191496207',
    host: new URLSearchParams(location.search).get("host"),
    forceRedirect: true
};

console.log('config', config);

const app = createApp(config);

const itemsLink = AppLink.create(app, {
    label: 'Products',
    destination: '/products',
  });
  
  const settingsLink = AppLink.create(app, {
    label: 'Settings',
    destination: '/settings',
  });
  
  const navigationMenu = NavigationMenu.create(app, {
    items: [itemsLink, settingsLink],
  });

  navigationMenu.set({active: undefined});

  const saveButton = Button.create(app, { label: 'Save' });
  
  // Trigger the action with a payload
  saveButton.dispatch(Button.Action.CLICK, {message: 'Saved'});
  // Subscribe to the action and read the payload
  saveButton.subscribe(Button.Action.CLICK, data => {
        console.log(data);
  });  

  var cart = Cart.create(app);
  cart.subscribe(Cart.Action.UPDATE, function (payload) {
    console.log('[Client] cart update', payload);
  });
  

  const titleBarOptions = {
    title: titleBar,
    buttons: {
      primary: saveButton,
    },
  };

  const myTitleBar = TitleBar.create(app, titleBarOptions);
  
  

  
  

