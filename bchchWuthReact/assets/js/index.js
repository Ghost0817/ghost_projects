import React from 'react';
import ReactDOM from 'react-dom';
import '../css/app.css';
import { BrowserRouter as Router,Switch,Route,Link } from 'react-router-dom';

import ShoppingList from './ShoppingList';

ReactDOM.render(
    <Router>
      <div>
        <nav>
          <ul>
            <li>
              <Link to="/">Home</Link>
            </li>
            <li>
              <Link to="/about">About</Link>
            </li>
            <li>
              <Link to="/users">Users</Link>
            </li>
          </ul>
        </nav>

        {/* A <Switch> looks through its children <Route>s and
            renders the first one that matches the current URL. */}
        <Switch>
          <Route path="/about">
          <h2>About</h2>
          </Route>
          <Route path="/users">
          <h2>Users</h2>
          </Route>
          <Route path="/">
          <h2>Home</h2><ShoppingList />
          </Route>
        </Switch>
      </div>
    </Router>
, document.getElementById('root'));
