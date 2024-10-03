import { bootstrapApplication } from '@angular/platform-browser';
import { RouteReuseStrategy, provideRouter, withPreloading, PreloadAllModules } from '@angular/router';
import { IonicRouteStrategy, provideIonicAngular } from '@ionic/angular/standalone';
import { addIcons } from 'ionicons';
import { cartOutline, constructOutline, helpCircle, homeOutline, locationOutline, personOutline, restaurantOutline, searchOutline, storefrontOutline, wineOutline, restaurant, wine, cart, construct, logInOutline, personAddOutline, } from 'ionicons/icons';
import { routes } from './app/app.routes';
import { AppComponent } from './app/app.component';
import { provideHttpClient } from '@angular/common/http';


addIcons(
  {
    'person-outline': personOutline,
    'cart-outline': cartOutline,
    'home-outline': homeOutline,
    'construct-outline': constructOutline,
    'storefront-outline': storefrontOutline,
    'wine-outline': wineOutline,
    'restaurant-outline': restaurantOutline,
    'search-outline': searchOutline,
    'location-outline': locationOutline,
    'restaurant': restaurant,
    'wine': wine,
    'cart': cart,
    'construct': construct,
    'help-circle': helpCircle,
    'log-in-outline': logInOutline,
    'person-add-outline': personAddOutline,
    
  }
);
bootstrapApplication(AppComponent, {
  providers: [
    provideHttpClient(),
    { provide: RouteReuseStrategy, useClass: IonicRouteStrategy },
    provideIonicAngular(),
    provideRouter(routes, withPreloading(PreloadAllModules)),
  ],
});
