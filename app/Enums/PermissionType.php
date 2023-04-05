<?php

namespace App\Enums;

class PermissionType
{

    // declare all permission for Profil 
    const EDITPROFIL = 'edit profil';
    const DELETEPROFIL = 'delete profil';
    const VIEWPROFIL = 'view Profil';
    const CREATEPROFIL = 'create Profil';
    const GESTIONPROFIL = 'gestion Profil';


     // declare all permission for command 
     const EDITPRODUIT = 'edit command';
     const DELETEPRODUIT = 'delete command';
     const VIEWPRODUIT = 'view command';
     const CREATEPRODUIT = 'create command';
     const GESTIONCOMMAND = 'gestion Command';


    // declare all permission for camoin 
    const EDITCAMION = 'edit camoin';
    const DELETECAMION = 'delete camoin';
    const VIEWCAMION = 'view camoin';
    const CREATECAMION = 'create camoin';
    const GESTIONCAMION = 'gestion camion';

    // declare all permission for camoin 
    const GESTIONFEEDBACK = 'gestionFeedBAck';
    const VIEWFEEDBACK = 'View FeedBAck';
    
    // declare All Permission for Consomation
    const EDITCONSOMATION = 'edit consomation';
    const DELETECONSOMATION = 'delete consomation';
    const VIEWCONSOMATION = 'view consomation';
    const CREATECONSOMATION = 'create consomation';
    const GESTIONCONSOMATION = 'gestion consomation';
}
