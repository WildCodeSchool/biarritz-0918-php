import React from "react";

export default function LoginForm({ onSubmit }) {
  return (
    <form
      onSubmit={e => {
        e.preventDefault();
        const username = e.target.elements.username.value;
        const password = e.target.elements.password.value;
        onSubmit({ username, password });
      }}
    >
      Email: <input name="username" type="email" /> <br />
      Password: <input name="password" type="password" /> <br />
      <button type="submit">Log-in</button>
    </form>
  );
}
