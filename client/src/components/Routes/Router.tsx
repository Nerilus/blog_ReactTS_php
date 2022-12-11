import React from 'react'
import { NavLink } from 'react-router-dom'

function Router() {
  return (
    <div>
    <ul>
      <li><NavLink to={"/"}>Home</NavLink> </li>
      <li><NavLink to={"/login"}>Login</NavLink> </li>
      <li><NavLink to={"/addpost"}>Register</NavLink> </li>
    </ul>
  </div>
  )
}

export default Router