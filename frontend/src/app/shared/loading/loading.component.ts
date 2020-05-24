import { Component, OnInit, Input } from '@angular/core';
import {
  Router,
  Event,
  NavigationCancel,
  NavigationEnd,
  NavigationError,
  NavigationStart
} from '@angular/router';

let activeLoad = false;

@Component({
  selector: 'app-loading',
  templateUrl: './loading.component.html',
  styleUrls: ['./loading.component.scss']
})
export class LoadingComponent implements OnInit {
  @Input() loading: boolean;
  @Input() loadingNavigation: boolean;

  constructor(private router: Router) {
  }

  ngOnInit() {
    if (this.loadingNavigation) {
      this.registerEvent();
    }
  }

  registerEvent() {
    this.router.events.subscribe((event: Event) => {
      switch (true) {
        case event instanceof NavigationStart: {
          if (!activeLoad) {
            activeLoad = this.loading = true;
          }
          break;
        }

        case event instanceof NavigationEnd:
        case event instanceof NavigationCancel:
        case event instanceof NavigationError: {
          activeLoad = this.loading = false;
          break;
        }
        default: {
          break;
        }
      }
    });
  }
}
