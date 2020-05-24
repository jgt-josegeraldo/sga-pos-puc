import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-bar',
  templateUrl: './bar.component.html',
  styleUrls: ['./bar.component.scss']
})
export class BarComponent implements OnInit {

  constructor(private route: Router) { }

  ngOnInit() {
  }

  nav() {
    this.route.navigate(['/ativos']);
  }

}
