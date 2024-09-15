import { Component } from '@angular/core';
import { IonHeader, IonToolbar, IonTitle, IonContent } from '@ionic/angular/standalone';
import { HeaderComponent } from "../components/header/header.component";
import { CategoriesSectionComponent } from "../components/categories-section/categories-section.component";
import { FooterComponent } from '../components/footer/footer.component';
import { FeaturedCarouselComponent } from '../components/featured-carousel/featured-carousel.component';
import { CategoriesPage } from "../pages/categories/categories.page";

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
  standalone: true,
  imports: [IonHeader, IonToolbar, IonTitle, IonContent, HeaderComponent, CategoriesSectionComponent,
    FooterComponent,
    FeaturedCarouselComponent, CategoriesPage],
})
export class HomePage {
  constructor() {}
}
