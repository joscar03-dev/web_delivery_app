import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FormsModule } from '@angular/forms';
import { EncabezadoComponent } from './compartido/componentes/encabezado/encabezado.component';
import { FormatoPrecioPipe } from './compartido/pipes/formato-precio.pipe';
import { CompartidoModule } from './compartido/compartido.module';
import { ContactoModule } from './funcionalidades/contacto/contacto.module';
import { MenuModule } from './funcionalidades/menu/menu.module';


@NgModule({
  declarations: [
    AppComponent,
    EncabezadoComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    CompartidoModule,
    ContactoModule, 
    MenuModule, 
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
