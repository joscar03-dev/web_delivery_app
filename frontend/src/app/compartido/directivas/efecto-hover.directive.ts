import { Directive, ElementRef, HostListener } from '@angular/core';

@Directive({
  selector: '[appEfectoHover]'
})
export class EfectoHoverDirective {

  constructor(private el: ElementRef){}

  @HostListener('mouseenter') onMouseEnter() {
    this.el.nativeElement.classList.add('shadow-lg', 'transform', 'scale-105');
  }
  @HostListener('mouseleave') onMouseLeave() {
    this.el.nativeElement.classList.remove('shadow-lg', 'transform', 'scale-105');
  }
}
