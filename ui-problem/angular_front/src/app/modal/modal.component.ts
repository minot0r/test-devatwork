import { Component, EventEmitter, Input, Output } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-modal',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './modal.component.html',
})
export class ModalComponent {
  @Input()
  title: string = 'Modal';
  @Input()
  open: boolean = false;
  @Output()
  onclose = new EventEmitter<void>();

  close() {
    this.open = false;
    this.onclose.emit();
  }
}
