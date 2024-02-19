import React from "react";
import "./style.css";

export const Frame = () => {
  return (
    <div className="frame">
      <div className="fragrancia">Fragrancia</div>
      <div className="navbar">
        <div className="text-wrapper">PARFUM FEMME</div>
        <div className="div">PARFUM HOMME</div>
        <div className="CORPS-BAIN">CORPS &amp; BAIN</div>
        <div className="text-wrapper-2">MARQUES</div>
      </div>
      <div className="div-2">
        <img className="img" alt="Utilisateur" src="utilisateur-1-1.png" />
        <img className="img" alt="Panier" src="panier-1-1.png" />
      </div>
    </div>
  );
};
