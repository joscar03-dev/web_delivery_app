import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-formulario-contacto',
  templateUrl: './formulario-contacto.component.html',
  styleUrls: ['./formulario-contacto.component.css'],
})
export class FormularioContactoComponent implements OnInit {
  my_form: FormGroup = new FormGroup({});

  ngOnInit(): void {
    this.my_form = new FormGroup({
      name: new FormControl('', Validators.required),
      email: new FormControl('', [Validators.required, Validators.email]),
      phone: new FormControl('', Validators.required),// Opcional
    });
  }
  enviarMensaje() {
    console.log("Formulario enviado",this.my_form.value);
  }
}
