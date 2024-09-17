import { Routes } from '@angular/router';
import { Component } from '@angular/core';
import { NegocioDetalleComponent } from './components/negocio-detalle/negocio-detalle.component';

export const routes: Routes = [
  {
    path: 'home',
    loadComponent: () => import('./home/home.page').then((m) => m.HomePage),
  },
  {
    path: '',
    redirectTo: 'home',
    pathMatch: 'full',
  },
  { path: 'negocio/:id', component: NegocioDetalleComponent }
];
